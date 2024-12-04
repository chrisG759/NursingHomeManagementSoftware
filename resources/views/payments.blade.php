<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Healthcare Payment Form</title>
  <style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f9f9f9;
}

.container {
  max-width: 600px;
  margin: 50px auto;
  background: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
}

h1 {
  text-align: center;
  color: #333;
}

fieldset {
  margin-bottom: 20px;
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
}

legend {
  font-size: 1.2em;
  font-weight: bold;
}

.form-section {
  margin-bottom: 15px;
}

label {
  display: block;
  margin-bottom: 5px;
  font-weight: bold;
  color: #555;
}

input {
  width: 100%;
  padding: 8px;
  border: 1px solid #ddd;
  border-radius: 4px;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

.calculation-section {
  text-align: center;
}

#total-cost {
  font-weight: bold;
  color: #333;
}

  </style>
</head>
<body>
  <div class="container">
    <h1>Healthcare Payment Form</h1>
    <form id="paymentForm">
      <!-- Patient Information Section -->
      <fieldset>
        <legend>Patient Information</legend>
        
        <!-- Patient ID -->
        <div class="form-section">
          <label for="patientId">Patient ID</label>
          <input type="text" id="patientId" placeholder="Enter Patient ID" required>
        </div>
        
        <!-- Patient Name -->
        <div class="form-section">
          <label for="patientName">Name</label>
          <input type="text" id="patientName" placeholder="Enter Patient Name" required>
        </div>
        
        <!-- Patient Email -->
        <div class="form-section">
          <label for="patientEmail">Email</label>
          <input type="email" id="patientEmail" placeholder="Enter Patient Email" required>
        </div>
      </fieldset>

      <!-- Payment Details Section -->
      <fieldset>
        <legend>Payment Details</legend>
        
        <!-- Days Stayed Input -->
        <div class="form-section">
          <label for="daysStayed">Number of Days Stayed in the Nursing Home</label>
          <input type="number" id="daysStayed" placeholder="Enter the number of days" required>
        </div>

        <!-- Appointments Input -->
        <div class="form-section">
          <label for="appointments">Number of Appointments</label>
          <input type="number" id="appointments" placeholder="Enter the number of appointments" required>
        </div>

        <!-- Medicine Cost Input -->
        <div class="form-section">
            <label for="medicineAmount">Amount of Medicine Prescribed</label>
            <input type="number" id="medicineAmount" placeholder="Enter the amount of medicine (units)" required>
          </div>
      </fieldset>

      <!-- Total Calculation -->
      <div class="calculation-section">
        <button type="button" id="calculate-btn">Calculate Total</button>
        <h3>Total Cost: <span id="total-cost">$0.00</span></h3>
      </div>

      <!-- Checkout Button -->
      <button type="submit" id="checkout-btn">Submit Payment</button>
    </form>
  </div>

  <script>
    document.getElementById('calculate-btn').addEventListener('click', function () {
      const daysStayed = parseInt(document.getElementById('daysStayed').value) || 0;
      const appointments = parseInt(document.getElementById('appointments').value) || 0;
      const medicineAmount = parseInt(document.getElementById('medicineAmount').value) || 0;

      // Calculate total cost
      const dailyRate = 10;
      const appointmentCost = 50;
      const medicineUnitCost = 5;

      const totalCost = (daysStayed * dailyRate) + (appointments * appointmentCost) + (medicineAmount * medicineUnitCost);

      // Display total cost
      document.getElementById('total-cost').textContent = `$${totalCost.toFixed(2)}`;
    });

    document.getElementById('paymentForm').addEventListener('submit', function (event) {
      event.preventDefault(); // Prevent page refresh on submit

      // Get form values
      const patientId = document.getElementById('patientId').value;
      const patientName = document.getElementById('patientName').value;
      const patientEmail = document.getElementById('patientEmail').value;
      const daysStayed = parseInt(document.getElementById('daysStayed').value) || 0;
      const appointments = parseInt(document.getElementById('appointments').value) || 0;
      const medicineAmount = parseInt(document.getElementById('medicineAmount').value) || 0;

      const dailyRate = 10;
      const appointmentCost = 50;
      const medicineUnitCost = 5;

      // Calculate total cost
      const totalCost = (daysStayed * dailyRate) + (appointments * appointmentCost) + (medicineAmount * medicineUnitCost);

      // Log data or handle form submission
      alert(`Payment Submitted!\nPatient ID: ${patientId}\nName: ${patientName}\nEmail: ${patientEmail}\nDays Stayed: ${daysStayed}\nAppointments: ${appointments}\nAmount of Medicine: ${medicineAmount} units\nTotal Cost: $${totalCost.toFixed(2)}`);
      
      // Data can be sent to the backend if needed
    });
  </script>
</body>
</html>
