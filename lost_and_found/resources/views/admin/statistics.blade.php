<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container py-4">
        <h1 class="text-center mb-4">Statistics</h1>

        <div class="row">
            <!-- Total Items -->
            <div class="col-md-4">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <h5>Total Items</h5>
                        <h3>{{ $totalItems }}</h3>
                    </div>
                </div>
            </div>

            <!-- Lost Items -->
            <div class="col-md-4">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">
                        <h5>Lost Items</h5>
                        <h3>{{ $lostItems }}</h3>
                    </div>
                </div>
            </div>

            <!-- Found Items -->
            <div class="col-md-4">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">
                        <h5>Found Items</h5>
                        <h3>{{ $foundItems }}</h3>
                    </div>
                </div>
            </div>

            <!-- Resolved Items -->
            <div class="col-md-4">
                <div class="card bg-info text-white mb-4">
                    <div class="card-body">
                        <h5>Resolved Items</h5>
                        <h3>{{ $resolvedItems }}</h3>
                    </div>
                </div>
            </div>

            <!-- Total Users -->
            <div class="col-md-4">
                <div class="card bg-secondary text-white mb-4">
                    <div class="card-body">
                        <h5>Total Users</h5>
                        <h3>{{ $totalUsers }}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
