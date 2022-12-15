<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">
              <span data-feather="home"></span>
              Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="users.php">
              <span data-feather="file"></span>
              Users
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="invoices.php">
              <span data-feather="shopping-cart"></span>
              Invoices            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="invoice_all.php">
              <span data-feather="shopping-cart"></span>
              Invoices  All          </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="banka.php">
              <span data-feather="shopping-cart"></span>
              Banka            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="banka.php?bank=1012291">
              <span data-feather="shopping-cart"></span>
              Banka Hesap Hareketleri  (Yapıkredi)        </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="banka.php?bank=800753">
              <span data-feather="shopping-cart"></span>
              Banka Hesap Hareketleri  (Enpara)        </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="invoices_grafik.php?cat=Users">
              <span data-feather="shopping-cart"></span>
              Büyüme Grafiği Users</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="invoices_grafik.php?cat=Amount">
              <span data-feather="shopping-cart"></span>
              Büyüme Grafiği Ciro</a>
          </li>
          <li class="nav-item">
            <?php $month =date('m')
             ?>
            <a class="nav-link" href="invoices_grafik.php?cat=WeekAmount&month=<?php echo $month ?>">
              <span data-feather="shopping-cart"></span>
              Büyüme Grafiği Haftalık</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="invoices_grafik.php?cat=Invoice">
              <span data-feather="shopping-cart"></span>
              Büyüme Grafiği Invoice         </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="invoices_grafik.php?cat=Stripe">
              <span data-feather="shopping-cart"></span>
              Büyüme Grafiği Stripe         </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mail.php">
              <span data-feather="shopping-cart"></span>
              INFO'dan Mail Gönder            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="ref.php">
              <span data-feather="shopping-cart"></span>
              Referanslar            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reftrans.php">
              <span data-feather="shopping-cart"></span>
              Referanslar İşlem            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cards.php">
              <span data-feather="shopping-cart"></span>
              Stopaj Kart İşlemleri            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="support.php">
              <span data-feather="shopping-cart"></span>
              Destek Talepleri            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="faturasiz.php">
              <span data-feather="shopping-cart"></span>
              Fatura Kesmeyenler            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">
              <span data-feather="shopping-cart"></span>
              Çıkış YAP            </a>
          </li>
          <hr>
          


         
        </ul>
      


       
      </div>
    </nav>