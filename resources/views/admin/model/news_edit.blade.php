@if($news)
@foreach($news as $newses)

<!-- Edit News Modal -->
<div class="modal fade" id="editNewsModal{{$newses->news_id}}" tabindex="-1" aria-labelledby="editNewsModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header py-2" style="background-color: #007bff; color: white;">
        <h5 class="modal-title fs-6" id="editNewsModalLabel">Edit News</h5>
        <a type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></a>
      </div>

      <!-- Modal Body -->
      <div class="modal-body p-3">
        <form action="#" method="POST" id="editNewsForm">
          @csrf

          <!-- News Input -->
          <div class="mb-3">
            <label for="newsContent" class="form-label">News</label>
            <input type="text" class="form-control" id="newsContent" name="news" value="{{$newses->news}}">
          </div>

          <!-- Buttons -->
          <div class="d-flex justify-content-end">
            <a href="javascript:0" type="submit" data-news_id="{{$newses->news_id}}" class="btn btn-primary me-2 update_news">Update</a>
            <a href="javascript:0" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
          </div>
        </form>
      </div>

    </div>
  </div>
</div>
@endforeach
@endif