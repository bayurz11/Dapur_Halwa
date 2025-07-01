 @section('title', 'Dapur Halwa | Galeri')
 <?php $page = 'Galeri'; ?>

 @extends('partials.main')

 @section('content')

     <section class="gallery section--nopb">
         <div class="container">
             <div class="gallery_main d-lg-flex justify-content-between" data-aos="fade-right">
                 <div class="gallery_main-content col-lg-6 col-xl-auto">
                     <!-- Filter Buttons -->
                     <div class="gallery_filter">
                         <button class="filter-btn active" data-filter="all">Semua</button>
                         <button class="filter-btn" data-filter="cake">Kue</button>
                         <button class="filter-btn" data-filter="dessert">Dessert</button>
                         <button class="filter-btn" data-filter="traditional">Tradisional</button>
                         <button class="filter-btn" data-filter="modern">Modern</button>
                     </div>
                 </div>
             </div>

             <!-- Gallery Grid -->
             <div class="gallery_grid" data-aos="fade-up">
                 <div class="row" id="galleryContainer">
                     <!-- Gallery Item 1 -->
                     <div class="col-md-6 col-lg-4 gallery-item-wrapper" data-category="cake modern">
                         <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal1">
                             <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400&h=300&fit=crop"
                                 alt="Blueberry Cheesecake" class="gallery-img">
                             <div class="gallery-content">
                                 <h3 class="gallery-title">Blueberry Cheesecake</h3>
                                 <p class="gallery-description">Cheesecake lembut dengan topping blueberry segar yang manis
                                     dan asam</p>
                                 <span class="gallery-tag">Cake</span>
                                 <span class="gallery-tag">Modern</span>
                                 <div class="gallery-price">Rp 185.000</div>
                                 <button class="btn btn-view">Lihat Detail</button>
                             </div>
                         </div>
                     </div>

                     <!-- Gallery Item 2 -->
                     <div class="col-md-6 col-lg-4 gallery-item-wrapper" data-category="dessert traditional">
                         <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal2">
                             <img src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=400&h=300&fit=crop"
                                 alt="Es Cendol" class="gallery-img">
                             <div class="gallery-content">
                                 <h3 class="gallery-title">Es Cendol Durian</h3>
                                 <p class="gallery-description">Minuman tradisional dengan cendol, santan, dan durian segar
                                 </p>
                                 <span class="gallery-tag">Dessert</span>
                                 <span class="gallery-tag">Tradisional</span>
                                 <div class="gallery-price">Rp 25.000</div>
                                 <button class="btn btn-view">Lihat Detail</button>
                             </div>
                         </div>
                     </div>

                     <!-- Gallery Item 3 -->
                     <div class="col-md-6 col-lg-4 gallery-item-wrapper" data-category="cake modern">
                         <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal3">
                             <img src="https://images.unsplash.com/photo-1464349095431-e9a21285b5f3?w=400&h=300&fit=crop"
                                 alt="Rainbow Cake" class="gallery-img">
                             <div class="gallery-content">
                                 <h3 class="gallery-title">Rainbow Layer Cake</h3>
                                 <p class="gallery-description">Kue berlapis warna-warni dengan buttercream yang lembut</p>
                                 <span class="gallery-tag">Cake</span>
                                 <span class="gallery-tag">Modern</span>
                                 <div class="gallery-price">Rp 220.000</div>
                                 <button class="btn btn-view">Lihat Detail</button>
                             </div>
                         </div>
                     </div>

                     <!-- Gallery Item 4 -->
                     <div class="col-md-6 col-lg-4 gallery-item-wrapper" data-category="traditional dessert">
                         <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal4">
                             <img src="https://images.unsplash.com/photo-1563805042-7684c019e1cb?w=400&h=300&fit=crop"
                                 alt="Klepon" class="gallery-img">
                             <div class="gallery-content">
                                 <h3 class="gallery-title">Klepon Tradisional</h3>
                                 <p class="gallery-description">Kue tradisional dengan isian gula merah dan kelapa parut</p>
                                 <span class="gallery-tag">Tradisional</span>
                                 <span class="gallery-tag">Dessert</span>
                                 <div class="gallery-price">Rp 15.000</div>
                                 <button class="btn btn-view">Lihat Detail</button>
                             </div>
                         </div>
                     </div>

                     <!-- Gallery Item 5 -->
                     <div class="col-md-6 col-lg-4 gallery-item-wrapper" data-category="cake modern">
                         <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal5">
                             <img src="https://images.unsplash.com/photo-1571115764595-644a1f56a55c?w=400&h=300&fit=crop"
                                 alt="Chocolate Lava Cake" class="gallery-img">
                             <div class="gallery-content">
                                 <h3 class="gallery-title">Chocolate Lava Cake</h3>
                                 <p class="gallery-description">Kue coklat dengan lelehan coklat di tengah yang hangat</p>
                                 <span class="gallery-tag">Cake</span>
                                 <span class="gallery-tag">Modern</span>
                                 <div class="gallery-price">Rp 45.000</div>
                                 <button class="btn btn-view">Lihat Detail</button>
                             </div>
                         </div>
                     </div>

                     <!-- Gallery Item 6 -->
                     <div class="col-md-6 col-lg-4 gallery-item-wrapper" data-category="traditional dessert">
                         <div class="gallery-item" data-bs-toggle="modal" data-bs-target="#galleryModal6">
                             <img src="https://images.unsplash.com/photo-1554520735-0a6b8b6ce8b7?w=400&h=300&fit=crop"
                                 alt="Onde-onde" class="gallery-img">
                             <div class="gallery-content">
                                 <h3 class="gallery-title">Onde-onde Wijen</h3>
                                 <p class="gallery-description">Bola-bola ketan dengan isian kacang hijau dan taburan wijen
                                 </p>
                                 <span class="gallery-tag">Tradisional</span>
                                 <span class="gallery-tag">Dessert</span>
                                 <div class="gallery-price">Rp 12.000</div>
                                 <button class="btn btn-view">Lihat Detail</button>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>

     <!-- Modals for Gallery Items -->
     <div class="modal fade" id="galleryModal1" tabindex="-1">
         <div class="modal-dialog modal-lg">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title">Blueberry Cheesecake</h5>
                     <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                 </div>
                 <div class="modal-body">
                     <img src="https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=600&h=400&fit=crop"
                         alt="Blueberry Cheesecake" class="modal-img mb-3">
                     <p><strong>Deskripsi:</strong> Cheesecake lembut dengan tekstur yang creamy dan topping blueberry segar
                         yang memberikan rasa manis dan asam yang sempurna.</p>
                     <p><strong>Bahan:</strong> Cream cheese, blueberry segar, biskuit graham, mentega, gula, telur</p>
                     <p><strong>Ukuran:</strong> Diameter 20cm (8-10 porsi)</p>
                     <p><strong>Harga:</strong> <span class="text-success fw-bold">Rp 185.000</span></p>
                 </div>
             </div>
         </div>
     </div>

     <!-- Add similar modals for other items... -->

     <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
     <script>
         document.addEventListener('DOMContentLoaded', function() {
             const filterButtons = document.querySelectorAll('.filter-btn');
             const galleryItems = document.querySelectorAll('.gallery-item-wrapper');

             filterButtons.forEach(button => {
                 button.addEventListener('click', function() {
                     // Remove active class from all buttons
                     filterButtons.forEach(btn => btn.classList.remove('active'));
                     // Add active class to clicked button
                     this.classList.add('active');

                     const filterValue = this.getAttribute('data-filter');

                     galleryItems.forEach(item => {
                         if (filterValue === 'all') {
                             item.style.display = 'block';
                         } else {
                             const categories = item.getAttribute('data-category').split(
                                 ' ');
                             if (categories.includes(filterValue)) {
                                 item.style.display = 'block';
                             } else {
                                 item.style.display = 'none';
                             }
                         }
                     });
                 });
             });
         });
     </script>


 @endsection
