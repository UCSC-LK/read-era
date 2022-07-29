<?php $this->view('includes/header')?>
<?php $this->view('includes/nav')?>
<?php $this->view('includes/topbar')?>
<style>
    /* (A) ENTIRE PAGE */
    #cal-wrap * {
        font-family: arial, sans-serif;

    }
    .current {
        display: none !important;
    }

    /* (B) CONTAINER */
    #cal-wrap {
        max-width: 100%;

    }

    /* (C) PERIOD SELECTOR */
    #cal-date { display: flex; }
    #cal-mth, #cal-yr {
        box-sizing: border-box;
        padding: 10px 20px;
        font-size: 1.2em;
        border: 0;
    }

    /* (D) CALENDAR */
    #calendar {
        width: 100%;
        border-collapse: collapse;
    }
    #calendar tr.head td {
        font-weight: bold;
        text-transform: uppercase;
        color: #fff;
        background: #0A2558;
        padding: 15px;
        text-align: center;
    }
    #calendar tr.day td {
        border: 1px solid #ddd;
        width: 14.28%;
        padding: 15px 5px;
        vertical-align: top;
    }
    #calendar tr.day td:hover {
        background: #fff9e4;
        cursor: pointer;
    }
    #calendar tr td.blank {
        background: #f5f5f5;
    }
    #calendar tr td.today {
        background: #ffdede;
    }
    #calendar .dd {
        font-size: 1.2em;
        color: #999;
    }
    #calendar .evt {
        margin-top: 5px;
        font-size: 0.8em;
        font-weight: bold;
        overflow: hidden;
        color: #0A2558;
    }

    /* (E) ADD/EDIT EVENT */
    #cal-event {
        padding: 15px;
        margin-top: 20px;

        background: #f5f5f5;
        border: 1px solid #ddd;
    }
    #cal-event h1 {
        color: #333;
        padding: 0;
        margin: 0;
    }
    #evt-date {
        color: #555;
        margin: 10px 0;
    }
    #cal-event textarea {
        display: block;
        box-sizing: border-box;
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        min-height: 100px;
    }
    #cal-event input[type=button], #cal-event input[type=submit] {
        padding: 10px;
        margin: 5px;
        font-size: 1.2em;
        border: 0;
        background: #0A2558;
        color: #fff;
    }

</style>

<div class="home-content">
    <div class="content-box">
        <div class="box1 box">
            <div class="header">
                <div class="title">Calendar</div><br>
                <br>
            </div>
            <div id="cal-wrap">
                <!-- Time Period Select -->
                <div id="cal-date">
                    <select id="cal-mth"></select>
                    <select id="cal-yr"></select>
                </div>

                <!-- Calendar -->
                <div id="cal-container"></div>

                <!-- Event Form -->

                <form id="cal-event">
                    <h1 id="evt-head"></h1>
                    <div id="evt-date"></div>
                    <textarea id="evt-details" required></textarea>
                    <input id="evt-close" type="button" value="Close"/>
                    <input id="evt-del" type="button" value="Delete"/>
                    <input id="evt-save" type="submit" value="Save"/>
                </form>

            </div>

        </div>

    </div>
</div>
</section>
<script>
    var cal = {
        // (A) PROPERTIES
        // (A1) COMMON CALENDAR
        sMon : true, // Week start on Monday?
        mName : ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], // Month Names

        // (A2) CALENDAR DATA
        data : null, // Events for the selected period
        sDay : 0, sMth : 0, sYear : 0, // Current selected day, month, year

        // (A3) COMMON HTML ELEMENTS
        hMth : null, hYear : null, // month/year selector
        hForm : null, hfHead : null, hfDate : null, hfTxt : null, hfDel : null, // event form

        // (B) INIT CALENDAR
        init : () => {
            // (B1) GET + SET COMMON HTML ELEMENTS
            cal.hMth = document.getElementById("cal-mth");
            cal.hYear = document.getElementById("cal-yr");
            cal.hForm = document.getElementById("cal-event");
            cal.hfHead = document.getElementById("evt-head");
            cal.hfDate = document.getElementById("evt-date");
            cal.hfTxt = document.getElementById("evt-details");
            cal.hfDel = document.getElementById("evt-del");
            document.getElementById("evt-close").onclick = cal.close;
            cal.hfDel.onclick = cal.del;
            cal.hForm.onsubmit = cal.save;

            // (B2) DATE NOW
            let now = new Date(),
                nowMth = now.getMonth(),
                nowYear = parseInt(now.getFullYear());

            // (B3) APPEND MONTHS SELECTOR
            for (let i=0; i<12; i++) {
                let opt = document.createElement("option");
                opt.value = i;
                opt.innerHTML = cal.mName[i];
                if (i==nowMth) { opt.selected = true; }
                cal.hMth.appendChild(opt);
            }
            cal.hMth.onchange = cal.list;

            // (B4) APPEND YEARS SELECTOR
            // Set to 10 years range. Change this as you like.
            for (let i=nowYear-12; i<=nowYear+12; i++) {
                let opt = document.createElement("option");
                opt.value = i;
                opt.innerHTML = i;
                if (i==nowYear) { opt.selected = true; }
                cal.hYear.appendChild(opt);
            }
            cal.hYear.onchange = cal.list;

            // (B5) START - DRAW CALENDAR
            cal.list();
        },

        // (C) DRAW CALENDAR FOR SELECTED MONTH
        list : () => {
            // (C1) BASIC CALCULATIONS - DAYS IN MONTH, START + END DAY
            // Note - Jan is 0 & Dec is 11
            // Note - Sun is 0 & Sat is 6
            cal.sMth = parseInt(cal.hMth.value); // selected month
            cal.sYear = parseInt(cal.hYear.value); // selected year
            let daysInMth = new Date(cal.sYear, cal.sMth+1, 0).getDate(), // number of days in selected month
                startDay = new Date(cal.sYear, cal.sMth, 1).getDay(), // first day of the month
                endDay = new Date(cal.sYear, cal.sMth, daysInMth).getDay(), // last day of the month
                now = new Date(), // current date
                nowMth = now.getMonth(), // current month
                nowYear = parseInt(now.getFullYear()), // current year
                nowDay = cal.sMth==nowMth && cal.sYear==nowYear ? now.getDate() : null ;

            // (C2) LOAD DATA FROM LOCALSTORAGE
            cal.data = localStorage.getItem("cal-" + cal.sMth + "-" + cal.sYear);
            if (cal.data==null) {
                localStorage.setItem("cal-" + cal.sMth + "-" + cal.sYear, "{}");
                cal.data = {};
            } else { cal.data = JSON.parse(cal.data); }

            // (C3) DRAWING CALCULATIONS
            // Blank squares before start of month
            let squares = [];
            if (cal.sMon && startDay != 1) {
                let blanks = startDay==0 ? 7 : startDay ;
                for (let i=1; i<blanks; i++) { squares.push("b"); }
            }
            if (!cal.sMon && startDay != 0) {
                for (let i=0; i<startDay; i++) { squares.push("b"); }
            }

            // Days of the month
            for (let i=1; i<=daysInMth; i++) { squares.push(i); }

            // Blank squares after end of month
            if (cal.sMon && endDay != 0) {
                let blanks = endDay==6 ? 1 : 7-endDay;
                for (let i=0; i<blanks; i++) { squares.push("b"); }
            }
            if (!cal.sMon && endDay != 6) {
                let blanks = endDay==0 ? 6 : 6-endDay;
                for (let i=0; i<blanks; i++) { squares.push("b"); }
            }

            // (C4) DRAW HTML CALENDAR
            // Get container
            let container = document.getElementById("cal-container"),
                cTable = document.createElement("table");
            cTable.id = "calendar";
            container.innerHTML = "";
            container.appendChild(cTable);

            // First row - Day names
            let cRow = document.createElement("tr"),
                days = ["Sun", "Mon", "Tue", "Wed", "Thur", "Fri", "Sat"];
            if (cal.sMon) { days.push(days.shift()); }
            for (let d of days) {
                let cCell = document.createElement("td");
                cCell.innerHTML = d;
                cRow.appendChild(cCell);
            }
            cRow.classList.add("head");
            cTable.appendChild(cRow);

            // Days in Month
            let total = squares.length;
            cRow = document.createElement("tr");
            cRow.classList.add("day");
            for (let i=0; i<total; i++) {
                let cCell = document.createElement("td");
                if (squares[i]=="b") { cCell.classList.add("blank"); }
                else {
                    if (nowDay==squares[i]) { cCell.classList.add("today"); }
                    cCell.innerHTML = `<div class="dd">${squares[i]}</div>`;
                    if (cal.data[squares[i]]) {
                        cCell.innerHTML += "<div class='evt'>" + cal.data[squares[i]] + "</div>";
                    }
                    cCell.onclick = () => { cal.show(cCell); };
                }
                cRow.appendChild(cCell);
                if (i!=0 && (i+1)%7==0) {
                    cTable.appendChild(cRow);
                    cRow = document.createElement("tr");
                    cRow.classList.add("day");
                }
            }

            // (C5) REMOVE ANY PREVIOUS ADD/EDIT EVENT DOCKET
            cal.close();
        },

        // (D) SHOW EDIT EVENT DOCKET FOR SELECTED DAY

        show : (el) => {
            // (D1) FETCH EXISTING DATA
            cal.sDay = el.getElementsByClassName("dd")[0].innerHTML;
            let isEdit = cal.data[cal.sDay] !== undefined ;


            // (D2) UPDATE EVENT FORM
            <?php if(Auth::rank() == 'Librarian'):?>
            cal.hfTxt.value = isEdit ? cal.data[cal.sDay] : "" ;
            cal.hfHead.innerHTML = isEdit ? "Edit Event" : "Add Event" ;
            cal.hfDate.innerHTML = `${cal.sDay} ${cal.mName[cal.sMth]} ${cal.sYear}`;
            if (isEdit) { cal.hfDel.classList.remove("current"); }
            else { cal.hfDel.classList.add("current"); }
            cal.hForm.classList.remove("current");
            <?php endif;?>
        },

        // (E) CLOSE EVENT DOCKET
        close : () => {
            cal.hForm.classList.add("current");
        },


        // (F) SAVE EVENT
        <?php if(Auth::rank() == 'Librarian'):?>
        save : () => {
            cal.data[cal.sDay] = cal.hfTxt.value;
            localStorage.setItem(`cal-${cal.sMth}-${cal.sYear}`, JSON.stringify(cal.data));
            cal.list();
            return false;
        },
        <?php endif;?>

        // (G) DELETE EVENT FOR SELECTED DATE
        <?php if(Auth::rank() == 'Librarian'):?>
        del : () => { if (confirm("Delete event?")) {
            delete cal.data[cal.sDay];
            localStorage.setItem(`cal-${cal.sMth}-${cal.sYear}`, JSON.stringify(cal.data));
            cal.list();
        }}
        <?php endif;?>
    };
    window.addEventListener("load", cal.init);
</script>



<?php $this->view('includes/footer')?>

