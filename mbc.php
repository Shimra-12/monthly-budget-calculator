<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Monthly Budget Calculator</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { 
        background: #eef3f1; 
        color: #1f2d2a; 
    }
        .calc-card { 
            max-width: 560px; 
            border: 0; 
            border-radius: 1rem; 
            box-shadow: 0 6px 24px rgba(31, 45, 42, .08); 
        }
        .calc-head { 
            background: #1f4d43; 
            color: #fff; 
            border-radius: 1rem 1rem 0 0; 
        }
        .btn-calc { 
            background: #1f4d43; 
            border-color: #1f4d43; 
            color: #fff; 
        }
        .btn-calc:hover, .btn-calc:focus { 
            background: #173a32; 
            border-color: #173a32; 
            color: #fff; 
        }
        .result-box { 
            background: #e0f2e9; 
            color: #14532d; 
            border-radius: .75rem; 
            padding: 1.25rem; 
            text-align: center; 
        }
        .result-box .amount { 
            font-size: 2rem; 
            font-weight: 700; 
        }
  </style>
</head>

<body>
    <!--HEADER: Starts -->
    <main class="container py-5">
        <div class="card calc-card mx-auto">
        <div class="calc-head p-4">
            <h1 class="h4 mb-1">Monthly budget calculator</h1>
            <p class="mb-0 small opacity-75">Enter your income and expenses to see what's left.</p>
        </div>
    <!--HEADER: Ends -->

        <!--INCOME: Starts-->
        <div class="card-body p-4">
            <form>
            <h2 class="h6 mb-3">Income</h2>
            <div class="mb-4">
                <label for="income" class="form-label">Monthly income</label>
                <div class="input-group">
                <span class="input-group-text">Rs. </span>
                <input type="number" class="form-control" id="income" min="0" placeholder="00">
                </div>
            </div>
        <!--INCOME: Ends-->

            <!--EXPENSES: Starts-->
            <h2 class="h6 mb-3">Expenses</h2>
            <div class="row g-3 mb-4">

                <!--FOOD-->
                <div class="col-sm-6">
                <label for="food" class="form-label">Food</label>
                <div class="input-group">
                    <span class="input-group-text">Rs. </span>
                    <input type="number" class="form-control" id="food" min="0" placeholder="00">
                </div>
                </div>

                <!--TRANSPORT-->
                <div class="col-sm-6">
                <label for="transport" class="form-label">Transport</label>
                <div class="input-group">
                    <span class="input-group-text">Rs. </span>
                    <input type="number" class="form-control" id="transport" min="0" placeholder="00">
                </div>
                </div>

                <!--BILLS-->
                <div class="col-sm-6">
                <label for="bills" class="form-label">Bills</label>
                <div class="input-group">
                    <span class="input-group-text">Rs. </span>
                    <input type="number" class="form-control" id="bills" min="0" placeholder="00">
                </div>
                </div>

                <!--OTHERS-->
                <div class="col-sm-6">
                <label for="other" class="form-label">Other</label>
                <div class="input-group">
                    <span class="input-group-text">Rs. </span>
                    <input type="number" class="form-control" id="other" min="0" placeholder="00">
                </div>
                </div>
            </div>
            <!--EXPENSES: Ends-->

            <!--CALCULATE BUTTON-->
            <div class="d-grid gap-2 d-sm-flex">
                <button type="button" class="btn btn-calc btn-lg flex-sm-fill" onclick="clickme()">Calculate balance</button>
                <button type="reset" class="btn btn-outline-secondary btn-lg">Clear</button>
            </div>
            </form>
        
            
            <div class="mt-4">
            <ul class="list-group list-group-flush mb-3">
                <!--TOTAL INCOME-->
                <li class="list-group-item d-flex justify-content-between px-0">
                <span>Total income</span><strong id="totalIncome">Rs. 00</strong>
                </li>

                <!--TOTAL EXPENSES-->
                <li class="list-group-item d-flex justify-content-between px-0">
                <span>Total expenses</span><strong id="totalExpenses">Rs. 00</strong>
                </li>
            </ul>

            <!--REMAINING BALANCE-->
            <div class="result-box">
                <div class="small">Remaining balance</div>
                <div class="amount" id="balance">Rs. 00</div>
            </div>

            <!--SAVING TIPS-->
            <div class="alert alert-secondary mt-3 mb-0" id="savingTip">
                Click "Calculate balance" to see your savings suggestion.
            </div>

<div id="result">
</div>

            </div>
        </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function clickme() {
        let incomes = Number(document.getElementById("income").value);
        let foods = Number(document.getElementById("food").value);
        let transports = Number(document.getElementById("transport").value);
        let bill = Number(document.getElementById("bills").value);
        let others = Number(document.getElementById("other").value);

        let totalexpense = foods + transports + bill + others;
        let balance = incomes - totalexpense;

        document.getElementById("totalIncome").textContent = "Rs. " + incomes;
        document.getElementById("totalExpenses").textContent = "Rs. " + totalexpense;
        document.getElementById("balance").textContent = "Rs. " + balance;

       // Savings suggestion
        let tip = document.getElementById("savingTip");

        if (balance <= 0) {
            // Nothing left, or spent more than earned
            tip.textContent = "You are over budget. Reduce your expenses.";
        } else if (balance <= 10000) {
            // Balance is between 1 and 10,000
            tip.textContent = "You are saving very little. Try to save more.";
        } else if (balance <= 30000) {
            // Balance is between 10,001 and 30,000
            tip.textContent = "Good! Move your savings to a savings account.";
        } else {
            // Balance is above 30,000 (every other case)
            tip.textContent = "Excellent! Consider a fixed deposit.";
        }

        document.getElementById("result").innerHTML =
        "Dear User, your income for this month is " + incomes + "<br>" +
        "and your total expense is " + totalexpense + "<br>"+
        "Now you have a remaining balance of " + balance + "<br>"
        + tip.textContent

        Swal.fire({
            title: "Budget Summary",
            html: document.getElementById("result").innerHTML
        });
    }
    </script>
    
</body>
</html>