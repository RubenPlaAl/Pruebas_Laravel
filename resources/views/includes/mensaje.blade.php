@if(\Session::get("success"))
  <div class="mensaje text-center">
    <p>{{\Session::get("success")}}</p>
  </div>
@endif