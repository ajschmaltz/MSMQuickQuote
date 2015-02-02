<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mower Matcher</title>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body ng-app="mm" style="padding: 5px;">
<div ng-controller="beltCtrl">
  <div class="row">
    <div class="col-md-2">
      <form class="form">
        <div class="form-group form-group-sm">
          <label>OEM</label>
          <select class="form-control" ng-model="search.Width">
            <option value="">Show All</option>
            <option ng-repeat="belt in filteredBelts | unique: 'OEM'">[[ belt.OEM ]]</option>
          </select>
        </div>
        <div class="form-group form-group-sm">
          <label>Length</label>
          <input placeholder="Min Length" type="number" ng-model="LENGTH.min" class="form-control" />
          -
          <input placeholder="Max Length" type="number" ng-model="LENGTH.max" class="form-control" />
        </div>
        <div class="form-group form-group-sm">
          <label>Width</label>
          <select class="form-control" ng-model="search.Width">
            <option value="">Show All</option>
            <option ng-repeat="belt in filteredBelts | unique: 'WIDTH'">[[ belt.WIDTH ]]</option>
          </select>
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
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<!-- AngularJS -->
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.11/angular.min.js"></script>
<!-- AngularJS Filters -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.2/angular-filter.min.js"></script>
<script src="/app.js"></script>
</body>
</html>