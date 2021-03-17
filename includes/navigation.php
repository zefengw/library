<nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <button class="btn btn-primary" id="menu-toggle"><- Menu</button>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <form method="post" action="">
            <li>
              <div class="input-group">
                <div class="nav-item active">
                  <input type="search" id="form1" class="form-control" placeholder="Search">
                </div>
            <button type="button" class="btn btn-primary" name="book_search">Go</button>
              </div>
            </li>
        </form>

            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>



            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Options
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Admin</a>
                <a class="dropdown-item" href="#">Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="login.php">
                  <?php
                  if(isset($_POST['login'])){
                    echo "Login";
                  }else{
                    echo "Logout";
                  }
                  ?>
                </a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
