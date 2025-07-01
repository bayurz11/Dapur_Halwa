 <div class="categories section--nopb" data-aos="fade-up">
     <div class="container">
         <ul class="categories_list d-flex flex-wrap justify-content-center">
             @foreach ($categories as $category)
                 <li class="categories_list-item col-6 col-md-4 col-xl-2" data-order="{{ $loop->iteration }}">
                     <a class="categories_list-item_wrapper" href="#">
                         {{-- {{ route('products.by_category', $category->slug) }} --}}
                         <div class="media">
                             <span class="overlay d-flex flex-column justify-content-end">
                                 <span class="overlay_content">{{ $category->products_count ?? '0' }} Items</span>
                             </span>
                             <picture>
                                 <source
                                     data-srcset="{{ asset($category->image ? 'storage/' . $category->image : 'assets_fe/img/placeholder.jpg') }}"
                                     srcset="{{ asset($category->image ? 'storage/' . $category->image : 'assets_fe/img/placeholder.jpg') }}"
                                     type="image/webp" />
                                 <img class="lazy"
                                     data-src="{{ asset($category->image ? 'storage/' . $category->image : 'assets_fe/img/placeholder.jpg') }}"
                                     src="{{ asset($category->image ? 'storage/' . $category->image : 'assets_fe/img/placeholder.jpg') }}"
                                     alt="{{ $category->name }}" />
                             </picture>
                         </div>
                         <h4 class="title">{{ $category->name }}</h4>
                     </a>
                 </li>
             @endforeach


         </ul>
     </div>
 </div>
