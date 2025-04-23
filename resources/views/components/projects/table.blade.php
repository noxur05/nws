<style>
  .btn:focus, .btn:active {
    border: none !important;
    outline: none !important;
  }
</style>

<div class="" style="width: 250px">
    <a class="btn btn-lg btn-primary w-100 px-0 rounded-3" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
      <div class="">Projects</div>
    </a>
    <div class="collapse" id="collapseExample">
      <table class="table table-striped rounded-bottom-3 text-center mb-0" style="border: 1px solid #dee2e6; overflow: hidden;">
        <tbody>
          @forelse ($projects as $project)
          <tr>
            <td><a class="link-primary text-decoration-none" href="{{ route('project.index', ['id'=> $project['id']])}}">{{ $project->name }}</a></td>
          </tr>
          @empty
          <tr>
            <td>No Projects Found</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
</div>