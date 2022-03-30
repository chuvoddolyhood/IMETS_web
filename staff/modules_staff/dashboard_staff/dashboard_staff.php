<main>
    <div class="main__container">
        <!-- MAIN TITLE STARTS HERE -->

        <div class="main__title">
            <div class="main__greeting">
                <h1>Hi! <?php echo $_SESSION['login_staff'] ?></h1>
                <p>Chào mừng đến với trang dành cho nhân viên IMETS</p>
            </div>
        </div>

        <!-- MAIN TITLE ENDS HERE -->

        <!-- MAIN CARDS STARTS HERE -->
        <div class="main__cards">
            <div class="card">
                <i class="fa fa-user-o fa-2x text-lightblue" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Number of Subscribers</p>
                    <span class="font-bold text-title">578</span>
                </div>
            </div>

            <div class="card">
                <i class="fa fa-calendar fa-2x text-red" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Times of Watching</p>
                    <span class="font-bold text-title">2467</span>
                </div>
            </div>

            <div class="card">
                <i class="fa fa-video-camera fa-2x text-yellow" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Number of Videos</p>
                    <span class="font-bold text-title">340</span>
                </div>
            </div>

            <div class="card">
                <i class="fa fa-thumbs-up fa-2x text-green" aria-hidden="true"></i>
                <div class="card_inner">
                    <p class="text-primary-p">Number of Likes</p>
                    <span class="font-bold text-title">645</span>
                </div>
            </div>
        </div>
        <!-- MAIN CARDS ENDS HERE -->

        <!-- CHARTS STARTS HERE -->
        <div class="charts">
            <div class="charts__left">
              <div class="charts__left__title">
                <div>
                    <h1>Daily Reports</h1>
                    <p>Cupertino, California, USA</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>
              <div id="apex1"></div>
            </div>

            <div class="charts__right">
              <div class="charts__right__title">
                <div>
                    <h1>Stats Reports</h1>
                    <p>Cupertino, California, USA</p>
                </div>
                <i class="fa fa-usd" aria-hidden="true"></i>
              </div>

              <div class="charts__right__cards">
                <div class="card1">
                    <h1>Income</h1>
                    <p>$75,300</p>
                </div>

                <div class="card2">
                    <h1>Sales</h1>
                    <p>$124,200</p>
                </div>

                <div class="card3">
                    <h1>Users</h1>
                    <p>3900</p>
                </div>

                <div class="card4">
                    <h1>Orders</h1>
                    <p>1881</p>
                </div>
              </div>
            </div>
        </div>
        <!-- CHARTS ENDS HERE -->
    </div>
</main>