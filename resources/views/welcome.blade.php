<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage with Hover Menu</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <style>

      a{
        color: #deff4d;
      }
      .navbar-brand {
            position: absolute;
            left: 0;
            top: 0;
            margin-left: 0;
        }
        
        .hover-container {
            display: none; 
            position: absolute;
            top: 112%;
            left: -353px;
            width: 100vw;
            height: 150vh; /* Full height of the viewport */
            background: #212529;
            padding: 2rem;
            box-sizing: border-box;
            z-index: 1000;
            grid-template-columns: repeat(5, 1fr);
            gap: 1rem;
            align-items: center;
            justify-items: center;
        }

        .nav-item:hover .hover-container {
            display: block; /* Show on hover */
        }

        .hover-container .row {
            margin: 0;
        }

        .hover-container .col-md-4 {
            padding: 0.5rem;
        }

        
    </style>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <!-- Navigation Bar -->
    <header class="bg-dark text-white p-3">
        <nav class="container">
            <div class="d-flex justify-content-between">
                <a href="#" class="navbar-brand">
                    <img src="/img/slalom-logo-blue-rgb.svg" alt="MyWebsite Logo" style="width: 150px;">
                </a>
                <ul class="nav">
                    <li class="nav-item position-relative">
                        <a class="nav-link text-white" href="#">Services</a>
                        <div class="hover-container">
                            <div class="container">
                                <div class="row">
                                @foreach($servicesArray as $name => $keys)
                                    <div class="col-md-4">
                                        <ul class="list-unstyled"><a href="#">{{ $name }}</a>
                                        @foreach($keys as $key)
                                        <li>{{ $key }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                  @endforeach
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item position-relative"><a class="nav-link text-white" href="#">Industries</a>
                    <div class="hover-container">
                            <div class="container">
                                <div class="row">
                                @foreach($industriesArray as $name => $keys)
                                    <div class="col-md-4">
                                        <ul class="list-unstyled"><a href="#">{{ $name }}</a>
                                        @foreach($keys as $key)
                                        <li>{{ $key }}</li>
                                        @endforeach
                                        </ul>
                                    </div>
                                  @endforeach
                                </div>
                            </div>
                        </div>
                      </li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Insights</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Stories</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Who We Are</a></li>
                    <li class="nav-item"><a class="nav-link text-white" href="#">Careers</a></li>
                </ul>
            </div>
        </nav>
    </header>
    <div class="container mt-4">
    <div class="row">
        <!-- First Dropdown -->
            <div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Search By Industry
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                        @foreach ($industries as $industry)
                            <label class="dropdown-item">
                                <input type="checkbox" class="filter-checkbox industry-checkbox mr-2" value="{{ $industry->id }}"> {{ $industry->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Second Dropdown -->
            <div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Search By Services
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                        @foreach ($services as $service)
                            <label class="dropdown-item">
                                <input type="checkbox" class="filter-checkbox service-checkbox mr-2" value="{{ $service->id }}"> {{ $service->service_name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Third Dropdown -->
            <div class="col-md-4">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Search by Name
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton3">
                        @foreach ($blogs as $blog)
                            <label class="dropdown-item">
                                <input type="checkbox" class="filter-checkbox name-checkbox mr-2" value="{{ $blog->id }}"> {{ $blog->name }}
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
    </div>

    <!-- Refresh Button -->
    <div class="row mt-4">
        <div class="col-md-12">
            <button id="refreshButton" class="btn btn-warning">Refresh</button>
        </div>
    </div>
</div>

<section style="padding: 45px;">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <!-- Cards will be injected here by JavaScript -->
    </div>
    <!-- Pagination Links -->
    <div class="d-flex justify-content-center mt-4">
        <ul class="pagination"></ul> <!-- Pagination links will be injected here -->
    </div>
</section>

 <!-- Optional Bootstrap JS and dependencies -->
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <!-- Popper.js (required for Bootstrap 4) -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
$(document).ready(function() {
    // Set up CSRF token in AJAX requests
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let selectedValues = {
        industry: [],
        services: [],
        names: []
    };
    let currentPage = 1;

    // Function to make AJAX call and update cards
    function makeAjaxCall() {
        $.ajax({
            url: '/filter-blogs', // Replace with your endpoint
            method: 'POST',
            data: {
                ...selectedValues,
                page: currentPage
            },
            success: function(response) {
                // Bind the response data to the cards
                bindDataToCards(response.data);
                // Update pagination links
                updatePagination(response.pagination);
            },
            error: function(error) {
                console.error('Error:', error);
            }
        });
    }

    // Listen for checkbox changes and trigger AJAX call
    $('.filter-checkbox').change(function() {
        // Identify which type of checkbox was changed
        if ($(this).hasClass('industry-checkbox')) {
            selectedValues.industry = getSelectedValues('.industry-checkbox');
        } else if ($(this).hasClass('service-checkbox')) {
            selectedValues.services = getSelectedValues('.service-checkbox');
        } else if ($(this).hasClass('name-checkbox')) {
            selectedValues.names = getSelectedValues('.name-checkbox');
        }

        // Reset to the first page when a filter is applied
        currentPage = 1;
        makeAjaxCall();
    });

    // Helper function to get selected values from checkboxes
    function getSelectedValues(selector) {
        let selected = [];
        $(selector + ':checked').each(function() {
            selected.push($(this).val());
        });
        return selected;
    }

    // Function to bind AJAX response data to cards
    function bindDataToCards(data) {
        let cardsContainer = $('.row-cols-md-3'); // The container for your cards
        cardsContainer.empty();

        data.forEach(function(blog) {
            cardsContainer.append(`
                <div class="col">
                    <div class="card h-100">
                        <div class="card-img-container">
                            <img src="/storage/${blog.image}" class="card-img-top" alt="${blog.name}">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">${blog.name}</h5>
                            <p class="card-text text-truncate" style="max-height: 100px; overflow: hidden;">
                                ${blog.description}
                            </p>
                        </div>
                    </div>
                </div>
            `);
        });
    }

    // Function to update pagination links
    function updatePagination(pagination) {
        let paginationContainer = $('.pagination');
        paginationContainer.empty();

        paginationContainer.append(pagination);
        
        // Rebind click events on new pagination links
        paginationContainer.find('a').on('click', function(e) {
            e.preventDefault();
            let url = $(this).attr('href');
            currentPage = url.split('page=')[1];
            makeAjaxCall();
        });
    }

    // Refresh button to clear all selections
    $('#refreshButton').click(function() {
        selectedValues = {
            industry: [],
            services: [],
            names: []
        };

        $('input[type="checkbox"]').prop('checked', false); // Uncheck all checkboxes
        currentPage = 1; // Reset to the first page
        makeAjaxCall(); // Refresh the cards
    });

    // Initial AJAX call to load the first page of data when the page loads
    makeAjaxCall();
});

</script>
</body>
</html>
