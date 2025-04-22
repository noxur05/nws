<div class="d-none d-sm-flex mt-5" style="width: 250px">
    <table class="table table-striped rounded-3 text-center" style="border: 1px solid #dee2e6; overflow: hidden;">
      <thead class="">
        <tr>
          <th scope="col">Services</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($resource_types as $resource_type)
          <tr>
            <td>{{ $resource_type->name }}</td>
          </tr>
        @empty
          <tr>
            <td>No Services Found</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
  