<style>
  .btn:focus, .btn:active {
    border: none !important;
    outline: none !important;
  }
</style>

<div class="" style="width: 250px">
    <a class="btn btn-lg btn-primary w-100 px-0 rounded-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      <div class="">Owned Teams</div>
    </a>
    <div class="collapse" id="collapseExample">
      <table class="table table-striped rounded-bottom-3 mb-0" style="border: 1px solid #dee2e6; overflow: hidden;">
        <tbody>
          @forelse ($globalOwnedTeams as $team)
          <tr>
            <td class="position-relative">
              <a class="link-primary text-decoration-none stretched-link d-flex justify-content-between w-100" href="{{ route('team.show', ['id'=> $team['id']])}}">
                <div class="">
                  {{ $team->name }}
                </div>
                <div class="">
                  <span><i class="bi bi-people-fill"></i> {{$team->users_count}}</span>
                </div>
              </a>
            </td>
          </tr>
          @empty
          <tr>
            <td>No Owned Teams Found</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
</div>