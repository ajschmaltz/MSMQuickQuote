@extends ('app')

@section ('content')
<div ng-app="mm" ng-controller="beltCtrl">
  <div class="row">
    <div class="col-md-2">
      <form class="form">
        <div class="form-group form-group-sm">
          <label>Length</label>
          <input placeholder="Min Length" type="number" ng-model="LENGTH.min" class="form-control" />
          -
          <input placeholder="Max Length" type="number" ng-model="LENGTH.max" class="form-control" />
        </div>
      </form>
    </div>
    <div class="col-md-10">
      <table class="table table-hover table-condensed small">
        <thead>
        <tr>
          <th>OEM</th>
          <th>LENGTH</th>
          <th>WIDTH</th>
          <th>COMMENT</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="belt in belts | filter:search | rangeFilter:{min: LENGTH.min, max: LENGTH.max, property: 'LENGTH'} | orderBy : 'Length' | as:this:'filteredBelts'">
          <td>[[ belt.OEM ]]</td>
          <td>[[ belt.LENGTH ]]</td>
          <td>[[ belt.WIDTH ]]</td>
          <td>[[ belt.COMMENT ]]</td>
        </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection