
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
                  <input type="checkbox" class="mr-2" value="{{$industry->id}}"> {{$industry->name}}
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
                  <input type="checkbox" class="mr-2" value="{{$service->id}}"> {{$service->service_name}}
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
              @foreach ($blogs as $blog )
                <label class="dropdown-item">
                  <input type="checkbox" class="mr-2" value="{{$blog->id}}"> {{$blog->name}}
                </label>
                @endforeach
              </div>
            </div>
          </div>
        </div>
  </div>
    <section style="padding: 45px;">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($blogs_pagination as $blog )
          <div class="col">
              <div class="card h-100">
                  <div class="card-img-container">
                      <img src="{{ asset('storage/' . $blog->image) }}" class="card-img-top" alt="{{ $blog->name }}">
                  </div>
                  <div class="card-body">
                      <h5 class="card-title">{{$blog->name}}</h5>
                      <p class="card-text text-truncate" style="max-height: 100px; overflow: hidden;">
                          {{$blog->description}}
                      </p>
                  </div>
              </div>
          </div>
        @endforeach
      </div>
      <!-- Pagination Links -->
  <div class="d-flex justify-content-center mt-4">
    {{ $blogs_pagination->links('pagination::bootstrap-4') }}
  </div>
    </section>