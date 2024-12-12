<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Roster</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .container {
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 700px;
        }
        h1 {
            color: #333;
        }
        .form-actions {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4 text-center">Create Roster</h1>
        <form id="rosterForm" action="{{ route('push-roster') }}" method="POST">
            @csrf
            @method('PUT') <!-- Correctly simulate PUT method -->
            
            <!-- Date Input -->
            <div class="form-group mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" id="date" name="date" class="form-control" required>
            </div>

            <!-- Supervisor Dropdown -->
            <div class="form-group mb-3">
                <label for="supervisor" class="form-label">Supervisor</label>
                <select id="supervisor" name="supervisor" class="form-select" required>
                    <option value="" disabled selected>Select a supervisor</option>
                    @foreach ($supervisors as $supervisor)
                        <option value="{{ $supervisor->employeeID }}">{{ $supervisor->first_name . ' ' . $supervisor->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Doctor Dropdown -->
            <div class="form-group mb-3">
                <label for="doctor" class="form-label">Doctor</label>
                <select id="doctor" name="doctor" class="form-select" required>
                    <option value="" disabled selected>Select a doctor</option>
                    @foreach ($doctors as $doctor)
                        <option value="{{ $doctor->employeeID }}">{{ $doctor->first_name . ' ' . $doctor->last_name }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Caregivers Dropdowns -->
            @for ($i = 1; $i <= 4; $i++)
            <div class="form-group mb-3">
                <label for="caregiver_{{ $i }}" class="form-label">Caregiver {{ $i }}</label>
                <select id="caregiver_{{ $i }}" name="caregiver_{{ $i }}" class="form-select" {{ $i === 1 ? 'required' : '' }}>
                    <option value="" disabled selected>Select caregiver {{ $i }}</option>
                    @foreach ($caregivers as $caregiver)
                        <option value="{{ $caregiver->employeeID }}">{{ $caregiver->first_name . ' ' . $caregiver->last_name }}</option>
                    @endforeach
                </select>
            </div>
            @endfor

            <!-- Form Actions -->
            <div class="form-actions d-flex justify-content-between">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </div>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
