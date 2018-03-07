@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (!have_posts())
    <div class="alert alert-warning">
      {{ __('Sorry, no results were found.', 'sage') }}
    </div>
    {!! get_search_form(false) !!}
  @endif
  <div class="container page-content">
    <div class="responsive-table">
      <table class="table-borderd jobs-table">
          <thead>
              <tr>
                  <td><?php _e('المسمي الوظيفي','bssGroup' ); ?></td>
                  <td><?php _e('العدد المطلوب','bssGroup' ); ?></td>
                  <td><?php _e('المستوي الوظيفي','bssGroup' ); ?></td>
                  <td><?php _e('قدم بياناتك','bssGroup' ); ?></td>
              </tr>
          </thead>
          @while (have_posts()) @php(the_post())
            @include('partials.content-'.get_post_type())
          @endwhile
      </table>
    </div>
    <!-- فورم ملئ البيانات -->         
    <div class="modal-box tornado-ui" id="form-id">
      <div class="modal-content">
        <div class="modal-head">المسمي الوظيفي<span class="close-modal ti-clear"></span></div>
          <div class="modal-body">
            <!-- ألفورم -->
            <form class="form-ui">
              <input type="text" placehold="انبوت كتابي">
              <select><option>اختيارات</option> </select>
              <!-- File input -->
              <div class="file-input">
                <input type="file">
                <span class="btn secondary">Browse</span>
                <input class="file-path" placeholder="رفع ملف">
              </div>
              <textare placeholder="نبذه"></textarea>
              <input type="submit" class="btn primary large rounded" value="ارسال البيانات">
            </form>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  {!! get_the_posts_navigation() !!}
@endsection
