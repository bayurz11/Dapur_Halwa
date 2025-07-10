 @section('title', 'Dapur Halwa | Galeri')
 <?php $page = 'Galeri'; ?>

 @extends('partials.main')

 @section('content')
     <!-- News content start -->
     <main class="news section">
         <div class="container d-md-flex justify-content-between">
             <div class="news_wrapper">
                 <ul class="news_list">
                     @foreach ($articles as $article)
                         <li class="news_list-item">
                             <div class="media">
                                 @php
                                     $thumbnailPath =
                                         $article->thumbnail &&
                                         file_exists(public_path('storage/' . $article->thumbnail))
                                             ? asset('storage/' . $article->thumbnail)
                                             : asset('assets_fe/img/placeholder.jpg');
                                 @endphp

                                 <picture>
                                     <source data-srcset="{{ $thumbnailPath }}" srcset="{{ $thumbnailPath }}"
                                         type="image/webp" />
                                     <img class="lazy" data-src="{{ $thumbnailPath }}" src="{{ $thumbnailPath }}"
                                         alt="Thumbnail {{ $article->title }}" />
                                 </picture>

                             </div>
                             <div class="main">
                                 <div class="main_metadata">
                                     <span class="main_metadata-item">
                                         <i class="icon-sticky_note icon"></i>
                                         {{ $article->category?->name ?? 'Uncategorized' }}

                                     </span>
                                     <span class="main_metadata-item">
                                         <i class="icon-calendar_day icon"></i>
                                         {{ $article->created_at->format('F j, Y') }}
                                     </span>
                                     {{-- <span class="main_metadata-item">
                                         <i class="icon-comments icon"></i>
                                         <span class="d-md-none">0</span>
                                         <span class="text d-none d-md-inline">No Comments</span>
                                     </span> --}}
                                 </div>
                                 <h4 class="main_title">{{ $article->title }}</h4>
                                 <p class="main_text">
                                     {{ $article->content
                                         ? Str::limit(strip_tags(str_replace('&nbsp;', ' ', $article->content)), 200, '...')
                                         : 'No content available' }}
                                 </p>

                                 <a class="main_link btn--underline" href="post.html">Read more</a>
                             </div>
                         </li>
                     @endforeach


                 </ul>
                 @if ($articles->total() > 2)
                     {{ $articles->links('vendor.pagination.custom') }}
                 @endif
             </div>
             <div class="widgets">
                 <div class="widgets-item widgets-item--search">
                     <h4 class="widgets-item_header">Search by Posts</h4>
                     <form class="form--search" data-type="searchPosts" action="#" method="get">
                         <input class="field required" type="text" placeholder="Type something..." />
                         <button class="btn" type="submit">Search</button>
                     </form>
                 </div>

                 <div class="widgets-item widgets-item--recent">
                     <h4 class="widgets-item_header d-flex align-items-center">
                         <span class="leaf">

                         </span>
                         Postingan Terbaru
                     </h4>
                     <ul class="list">
                         @foreach ($articles as $article)
                             @php
                                 $thumbnailPath =
                                     $article->thumbnail && file_exists(public_path('storage/' . $article->thumbnail))
                                         ? asset('storage/' . $article->thumbnail)
                                         : asset('assets_fe/img/placeholder.jpg');
                             @endphp
                             <li class="list-item">
                                 <a class="d-flex flex-column flex-sm-row align-items-sm-center" href="post.html">
                                     <span class="media">
                                         <picture>
                                             <source data-srcset="{{ $thumbnailPath }}" srcset="{{ $thumbnailPath }}"
                                                 type="image/webp" />
                                             <img class="preview" data-src="{{ $thumbnailPath }}"
                                                 src="{{ $thumbnailPath }}" alt="post" />
                                         </picture>
                                     </span>
                                     <span class="wrapper">
                                         <span class="title">{{ $article->title }}</span>
                                         <span class="metadata d-flex align-items-center"><i
                                                 class="icon-calendar_day icon"></i>{{ $article->created_at->format('F j, Y') }}</span>
                                     </span>
                                 </a>
                             </li>
                         @endforeach
                     </ul>
                 </div>
                 <div class="widgets-item widgets-item--tags">
                     <h4 class="widgets-item_header d-flex align-items-center">

                         Kategori
                     </h4>
                     <ul class="list d-flex flex-wrap">
                         <li class="list-item">
                             <a class="link d-inline-flex align-items-center justify-content-center"
                                 href="#">Vaping</a>
                         </li>

                     </ul>
                 </div>
                 <div class="widgets-item widgets-item--tags">
                     <h4 class="widgets-item_header d-flex align-items-center">

                         Tags
                     </h4>
                     <ul class="list d-flex flex-wrap">
                         <li class="list-item">
                             <a class="link d-inline-flex align-items-center justify-content-center"
                                 href="#">Vaping</a>
                         </li>
                         <li class="list-item">
                             <a class="link d-inline-flex align-items-center justify-content-center"
                                 href="#">Cannabis</a>
                         </li>
                         <li class="list-item">
                             <a class="link d-inline-flex align-items-center justify-content-center"
                                 href="#">Flower</a>
                         </li>
                         <li class="list-item">
                             <a class="link d-inline-flex align-items-center justify-content-center"
                                 href="#">Health</a>
                         </li>
                         <li class="list-item">
                             <a class="link d-inline-flex align-items-center justify-content-center"
                                 href="#">Nature</a>
                         </li>
                         <li class="list-item">
                             <a class="link d-inline-flex align-items-center justify-content-center" href="#">Help</a>
                         </li>
                         <li class="list-item">
                             <a class="link d-inline-flex align-items-center justify-content-center"
                                 href="#">Facts</a>
                         </li>
                         <li class="list-item">
                             <a class="link d-inline-flex align-items-center justify-content-center"
                                 href="#">Medicine</a>
                         </li>
                     </ul>
                 </div>

                 <div class="widgets-item widgets-item--calendar">
                     <h4 class="widgets-item_header d-flex align-items-center">

                         Calendar
                     </h4>
                     <table class="table">
                         <caption class="table_header">
                             October 2021
                         </caption>
                         <tbody class="table_body">
                             <tr class="table_body-week">
                                 <th class="table_body-week_day">S</th>
                                 <th class="table_body-week_day">M</th>
                                 <th class="table_body-week_day">T</th>
                                 <th class="table_body-week_day">W</th>
                                 <th class="table_body-week_day">T</th>
                                 <th class="table_body-week_day">F</th>
                                 <th class="table_body-week_day">S</th>
                             </tr>
                             <tr class="table_body-dates">
                                 <td class="table_body-dates_date"></td>
                                 <td class="table_body-dates_date"></td>
                                 <td class="table_body-dates_date"></td>
                                 <td class="table_body-dates_date">1</td>
                                 <td class="table_body-dates_date">2</td>
                                 <td class="table_body-dates_date">3</td>
                                 <td class="table_body-dates_date">4</td>
                             </tr>
                             <tr class="table_body-dates">
                                 <td class="table_body-dates_date">5</td>
                                 <td class="table_body-dates_date">6</td>
                                 <td class="table_body-dates_date">7</td>
                                 <td class="table_body-dates_date">8</td>
                                 <td class="table_body-dates_date">9</td>
                                 <td class="table_body-dates_date">10</td>
                                 <td class="table_body-dates_date">11</td>
                             </tr>
                             <tr class="table_body-dates">
                                 <td class="table_body-dates_date">12</td>
                                 <td class="table_body-dates_date">13</td>
                                 <td class="table_body-dates_date">14</td>
                                 <td class="table_body-dates_date">15</td>
                                 <td class="table_body-dates_date table_body-dates_date--current">16</td>
                                 <td class="table_body-dates_date">17</td>
                                 <td class="table_body-dates_date">18</td>
                             </tr>
                             <tr class="table_body-dates">
                                 <td class="table_body-dates_date">19</td>
                                 <td class="table_body-dates_date">20</td>
                                 <td class="table_body-dates_date">21</td>
                                 <td class="table_body-dates_date">22</td>
                                 <td class="table_body-dates_date">23</td>
                                 <td class="table_body-dates_date">24</td>
                                 <td class="table_body-dates_date">25</td>
                             </tr>
                             <tr class="table_body-dates">
                                 <td class="table_body-dates_date">26</td>
                                 <td class="table_body-dates_date">27</td>
                                 <td class="table_body-dates_date">28</td>
                                 <td class="table_body-dates_date">29</td>
                                 <td class="table_body-dates_date">30</td>
                                 <td class="table_body-dates_date">31</td>
                                 <td class="table_body-dates_date"></td>
                             </tr>
                         </tbody>
                     </table>
                     <div class="navigation d-flex align-items-center justify-content-between">
                         <a class="navigation_control navigation_control--prev d-inline-flex align-items-center"
                             href="#">
                             <i class="icon-caret_left icon"></i>
                             Previous
                         </a>
                         <a class="navigation_control navigation_control--next d-inline-flex align-items-center"
                             href="#">
                             Next
                             <i class="icon-caret_right icon"></i>
                         </a>
                     </div>
                 </div>

             </div>
         </div>
     </main>
     <!-- News content end -->
 @endsection
