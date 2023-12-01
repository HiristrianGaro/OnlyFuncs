<video id="background-video" autoplay loop muted>
    <source src="./assets/img/videos/background_macos.mp4" type="video/mp4">
</video> 
    <div class="container mb-5">
        <div class="card mx-auto">
            <h2 class="text-center mt-3 mb-0">Login</h2>
            <form class="mx-4 my-2" action="./backend/check.php" method="post">
                <div class="form-group">
                <label for="Email">Email</label>
                <input type="email" class="form-control" name="email" id="nome" placeholder=" name@example.com">
                </div>
                <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" class="form-control" name="password"id="pwd" placeholder="Password">
                </div>
                <div class="form-group">
                    <input type="checkbox" id="Remember Me" name="rememberme" value="0">
                    <label for="demoCheckbox">Remember me</label>
                </div>
                <div class="form-group">
                    <button class="btn btn-secondary main_color_bkg" type="submit">Login</button>
                </div>
                </div>
            </form>
        </div>
    </div>
    <br>

