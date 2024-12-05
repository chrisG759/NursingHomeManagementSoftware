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

    .error-message, .success-message {
      text-align: center;
    }

    .error-message {
      color: red;
    }

    .success-message {
      color: green;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Healthcare Payment Form</h1>
    @if(session('error'))
    <div class="error-message">{{ session('error') }}</div>
    @endif

    @if(session('success'))
    <div class="success-message">{{ session('success') }}</div>
    @endif
    
    <form method="GET" action="{{ route('payment.search') }}">
      <!-- Patient Search Section -->
      <fieldset>
        <legend>Search for Patient Payment</legend>
        
        <!-- Patient ID Search -->
        <div class="form-section">
          <label for="patientId">Enter Patient ID to Search Payment</label>
          <input type="text" id="patientId" name="patientId" placeholder="Enter Patient ID" required>
        </div>

        <button type="submit">Search Payment</button>
      </fieldset>
    </form>

    <!-- Payment Details Form -->
    @isset($patient)
    <form id="paymentForm" method="POST" action="{{ route('payment.submit') }}">
      @csrf
      <fieldset>
        <legend>Patient Information</legend>
        
        <!-- Patient ID -->
        <div class="form-section">
          <label for="patientId">Patient ID</label>
          <input type="text" id="patientId" name="patientId" value="{{ old('patientId', $patient->patientID) }}" readonly>
        </div>
        
        <!-- Patient Name -->
        <div class="form-section">
          <label for="patientName">Name</label>
          <input type="text" id="patientName" name="patientName" value="{{ old('patientName', $patient->first_name) }}" readonly>
        </div>
        
        <!-- Patient Email -->
        <div class="form-section">
          <label for="patientEmail">Email</label>
          <input type="email" id="patientEmail" name="patientEmail" value="{{ old('patientEmail', $patient->email) }}" readonly>
        </div>
      </fieldset>

      <fieldset>
        <legend>Payment Details</legend>
        
        <!-- Days Stayed Input -->
        <div class="form-section">
          <label for="daysStayed">Number of Days Stayed in the Nursing Home</label>
          <input type="number" id="daysStayed" name="daysStayed" value="{{ old('daysStayed', $daysStayed) }}" readonly>
        </div>

        <!-- Appointments Input -->
        <div class="form-section">
          <label for="appointments">Number of Appointments</label>
          <input type="number" id="appointments" name="appointments" value="{{ old('appointments', $appointmentCount) }}" readonly>
        </div>

        <!-- Medicine Cost Input -->
        <div class="form-section">
          <label for="medicineAmount">Amount of Medicine Prescribed</label>
          <input type="number" id="medicineAmount" name="medicineAmount" value="{{ old('medicineAmount', $medicationCount) }}" readonly>
        </div>
      </fieldset>

      <!-- Total Calculation -->
      <div class="calculation-section">
        <h3>Total Cost: <span id="total-cost">${{ number_format($totalCost, 2) }}</span></h3>
      </div>

      <!-- Payment Input -->
      <fieldset>
        <legend>Make a Payment</legend>
        
        <!-- Payment Amount Input -->
        <div class="form-section">
          <label for="paymentAmount">Payment Amount</label>
          <input type="number" id="paymentAmount" name="paymentAmount" placeholder="Enter payment amount" required>
        </div>
      </fieldset>

      <!-- Checkout Button -->
      <button type="submit" id="checkout-btn">Submit Payment</button>
    </form>
    @endisset
  </div>
</body>
</html>
