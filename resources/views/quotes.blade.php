@extends ('app')

@section ('content')
<div ng-app="mm" ng-controller="matchCtrl">
  <div ng-hide="printMode" class="row">
    <div class="col-md-2">
      <form class="form">
        <div class="form-group form-group-sm">
          <label>Presets</label>
          <select class="form-control" ng-change="setPreset(preset)" ng-model="preset">
            <option value="">Select</option>
            <optgroup label="Homeowner">
              <option>Walk Behind</option>
              <option>Walk Behind - Eco</option>
              <option>Walk Behind - Premium</option>
              <option>Zero Turn</option>
              <option>Zero Turn - Eco</option>
              <option>Zero Turn - Premium</option>
            </optgroup>
            <optgroup label="Mid Duty">
              <option>Mid Duty</option>
              <option>Mid Duty - Eco</option>
              <option>Mid Duty - Premium</option>
            </optgroup>
            <optgroup label="Commercial">
              <option>Small Spaces</option>
              <option>Rider - Eco</option>
              <option>Rider - Premium</option>
              <option>Stander</option>
            </optgroup>
          </select>
        </div>
        <div class="form-group form-group-sm">
          <label>Brand</label>
          <select class="form-control" ng-model="search.Brand">
            <option value="">Show All</option>
            <option ng-repeat="mower in filteredMowers | unique: 'Brand'">[[ mower.Brand ]]</option>
          </select>
        </div>
        <div class="form-group form-group-sm">
          <label>Series</label>
          <select class="form-control" ng-model="search.Series">
            <option value="">Show All</option>
            <option ng-repeat="mower in filteredMowers | unique: 'Series'">[[ mower.Series ]]</option>
          </select>
        </div>
        <div class="form-group form-group-sm">
          <label>Model</label>
          <input ng-model="search.Model" class="form-control"/>
        </div>
        <div class="form-group form-group-sm">
          <label>Style</label>
          <select class="form-control" ng-model="search.Style">
            <option value="">Show All</option>
            <option ng-repeat="mower in filteredMowers | unique: 'Style'">[[ mower.Style ]]</option>
          </select>
        </div>
        <div class="form-group form-group-sm">
          <label>Use</label>
          <select class="form-control" ng-model="search.Use">
            <option value="">Show All</option>
            <option ng-repeat="mower in filteredMowers |  unique: 'Use'">[[ mower.Use ]]</option>
          </select>
        </div>
        <div class="form-group form-group-sm">
          <label>Width</label>
          <input placeholder="Min Width" type="number" ng-model="Width.min" class="form-control" />
          -
          <input placeholder="Max Width" type="number" ng-model="Width.max" class="form-control" />
        </div>
        <div class="form-group form-group-sm">
          <label>Engine</label>
          <select class="form-control" ng-model="search.Engine">
            <option value="">Show All</option>
            <option ng-repeat="mower in filteredMowers | unique: 'Engine'">[[ mower.Engine ]]</option>
          </select>
        </div>
        <div class="form-group form-group-sm">
          <label>Engine Model</label>
          <select class="form-control" ng-model="search.Engine_Model">
            <option value="">Show All</option>
            <option ng-repeat="mower in filteredMowers | unique: 'Engine_Model'">[[ mower.Engine_Model ]]</option>
          </select>
        </div>
        <div class="form-group form-group-sm">
          <label>Fuel</label>
          <select class="form-control" ng-model="search.Fuel">
            <option value="">Show All</option>
            <option ng-repeat="mower in filteredMowers | unique: 'Fuel'">[[ mower.Fuel ]]</option>
          </select>
        </div>
        <div class="form-group form-group-sm">
          <label>Sale Price</label>
          <input placeholder="Min Price" type="number" ng-model="Sale.min" class="form-control" />
          -
          <input placeholder="Max Price" type="number" ng-model="Sale.max" class="form-control" />
        </div>
        <div class="form-group form-group-sm">
          <label>Financing</label>
          <input placeholder="Min Finance" type="number" ng-model="Finance.min" class="form-control" />
          -
          <input placeholder="Max Finance" type="number" ng-model="Finance.max" class="form-control" />
        </div>
        <div class="form-group form-group-sm">
          <label>Warranty</label>
          <select class="form-control" ng-model="search.Warranty">
            <option value="">Show All</option>
            <option ng-repeat="mower in filteredMowers | unique: 'Warranty'">[[ mower.Warranty ]]</option>
          </select>
        </div>
      </form>
    </div>
    <div class="col-md-10">
      <table class="table table-hover table-condensed small">
        <thead>
        <tr>
          <th>Brand</th>
          <th>Series</th>
          <th>Model</th>
          <th>Style</th>
          <th>Use</th>
          <th>Width</th>
          <th>HP</th>
          <th>Engine</th>
          <th>Engine Model</th>
          <th>Fuel</th>
          <th>MSRP</th>
          <th>Sale</th>
          <th>Event</th>
          <th>Finance</th>
          <th>Warranty</th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="mower in mowers | filter:search | rangeFilter:{min: Width.min, max: Width.max, property: 'Width'}  | rangeFilter:{min: Sale.min, max: Sale.max, property: 'Sale'} | rangeFilter:{min: Finance.min, max: Finance.max, property: 'Finance'} | orderBy : 'MSRP' | as:this:'filteredMowers'">
          <td>[[ mower.Brand ]]</td>
          <td>[[ mower.Series ]]</td>
          <td>[[ mower.Model ]]</td>
          <td>[[ mower.Style ]]</td>
          <td>[[ mower.Use ]]</td>
          <td>[[ mower.Width ]]</td>
          <td>[[ mower.HP ]]</td>
          <td>[[ mower.Engine ]]</td>
          <td>[[ mower.Engine_Model ]]</td>
          <td>[[ mower.Fuel ]]</td>
          <td>[[ mower.MSRP ]]</td>
          <td><input size="4" ng-model="mower.Sale" value="[[ mower.Sale ]]"</td>
          <td>[[ mower.Event ]]</td>
          <td>[[ mower.Finance ]]</td>
          <td>[[ mower.Warranty ]]</td>
        </tr>
        </tbody>
      </table>
      <span class="btn btn-success" ng-click="printMode = 1">Print Quote</span>
    </div>
  </div>
  <div ng-show="printMode">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <img src="http://mainstreetmower.com/logo.png" width="500px" />
          <h4>Custom Quote</h4>
        </div>
        <hr/>
        <p><strong>Note:</strong> <i>Good information for those receiving a quote can leave with</i>.</p>
        <hr/>
      </div>
      <ul class="media-list">
        <li class="media" ng-repeat="mower in filteredMowers">
          <div class="media-left">
            <a href="#">
              <img width="90px" class="media-object" ng-src="[[ mower.Image ]]">
            </a>
          </div>
          <div class="media-body">
            <h4 class="media-heading">[[ mower.Brand ]] [[ mower.Series ]] - <small>[[ mower.Model ]]</small></h4>
            <p><span class="lead">[[ mower.Sale | currency ]]</span> | [[ mower.HP ]]HP [[ mower.Engine ]] [[ mower.Engine_Model ]] | [[ mower.Width ]]" Cutting Width | [[ mower.Warranty ]] Warranty | Financing from [[ mower.Finance | currency ]]</p>
          </div>
        </li>
      </ul>
    </div>
  </div>
</div>
@endsection