
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <title>Login - SI PDK & JKN</title>
  <link href="{{base_url()}}/static/css/styles.css" rel="stylesheet" />

  <link rel="stylesheet" type="text/css" href="{{base_url()}}/static/css/bootstrap413.css">

  <script src="{{base_url()}}/static/assets/font-awesome-513/all.min.js" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
</head>
<body class="bg-primary">
  <div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
      <main>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5">
              <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                <div class="card-body">

                  @if(!empty($this->session->flashdata('error_login')))
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="alert-icon"><i class="fa fa-bell"></i></span>
                    <span class="alert-text">{{$this->session->flashdata('error_login') }}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  @endif

                  
                  <form action="{{ base_url() }}login" method="post">
                    <div class="form-group">
                      <label class="small mb-1">Username</label>
                      <input name="username" class="form-control py-4" type="text" placeholder="Username" />
                    </div>
                    <div class="form-group">
                      <label class="small mb-1" >Password</label>
                      <input name="password" class="form-control py-4" type="password" placeholder="password" />
                    </div>
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary my-4">Login</button>
                    </div>
                  </form>
                </div>

              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>
  <script src="{{base_url()}}/static/js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
  <script src="{{base_url()}}/static/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
  <script src="{{base_url()}}/static/js/scripts.js"></script>
</body>
</html>
