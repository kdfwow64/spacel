<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Route Planner is a clone of google Maps Engine service https://mapsengine.google.com.">
    <meta name="author" content="Cuan-Chai Megghross, James Belle">
    <title>Route Planner</title>
    <link rel="stylesheet" media="all" href="assets/vendors/route-planner/lib/bootstrap-3.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" media="all" href="assets/vendors/route-planner/lib/whhg-font/css/whhg.css">
    <link rel="stylesheet" media="all" href="./assets/vendors/route-planner/css/s.css">
    <link href="assets/vendors/material-icons/material-icons.css" rel="stylesheet" type="text/css">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="lib/bootstrap-3.0.0/assets/js/html5shiv.js"></script>
      <script src="lib/bootstrap-3.0.0/assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="ro-loading-container" data-bind="fade:!isReady()">
          <div class="ro-loading"></div>
        </div>
        <div id="container" class="ro-container">
          <div id="map" class="ro-map"></div>

          <!-- ko with: currentProject -->

            <!-- Main sheet -->
            <div class="ro-project" data-bind="style:{maxHeight:maxContainerHeight}">
              <div class="ro-project-inner" data-bind="click:deselectLayer">
                <h4 data-bind="text:name()||'Untitled Route Layer'"></h4>
                <p data-bind="html:descriptionHTML"></p>
                <div class="ro-project-add-layer"><a href="#" data-bind="click:addLayer,clickBubble:false" title="Add Route Layer">Add Route Layer</a></div>
              </div>
              <div class="ro-controls ro-project-settings-controls">
                <a class="glyphicon glyphicon-floppy-disk" href="#" data-bind="click:saveProject" title="Save Map"></a>
                <a class="glyphicon glyphicon-cog" href="#" data-bind="click:editSettings" title="Open Map Settings"></a>
                <a class="glyphicon glyphicon-remove" href="#" data-bind="click:closeProject" title="Close Map"></a>
              </div>
              <div class="ro-layers" id="ro-layers" data-bind="sortable:{data:layers,connectClass:'ro-layers'}">
                <div class="ro-layer" data-bind="css:{'ro-layer-active':$parent.isLayerSelected($data),'ro-layer-disable-select':!isVisible()},click:$parent.selectLayer.bind($parent,$data)">
                  <div class="ro-layer-header">
                    <a class="ro-layer-title" href="#" data-bind="click:switchExpand,clickBubble:false">
                      <i class="glyphicon" data-bind="css:{'icon-calcminus':isExpanded(),'icon-calcplus':!isExpanded()},visible:isVisible"></i>
                      <i class="glyphicon" data-bind="visible:!isVisible()">&nbsp;</i>
                      <span data-bind="text:name()||'Empty Route Name'"></span>
                    </a>
                    <div class="ro-controls ro-controls-aright">
                      <!--<a class="glyphicon glyphicon-cog" href="#" data-bind="visible:$parent.isLayerSelected($data),click:editSettings,clickBubble:false" title="Edit layer settings"></a>-->
                      <a class="glyphicon glyphicon-check" href="#" data-bind="visible:isVisible,click:hide,clickBubble:false" title="Hide layer"></a>
                      <a class="glyphicon glyphicon-unchecked" href="#" data-bind="visible:!isVisible(),click:show,clickBubble:false" title="Show layer"></a>
                    </div>
                  </div>
                  <!-- ko if: isExpanded -->
                    <div class="ro-layer-body">
                      <div class="ro-layer-body-empty" data-bind="visible:shapes().length==0">Empty Route</div>
                      <div class="ro-shapes" data-bind="sortable:{data:shapes,connectClass:'ro-shapes',afterMove:$parent.dragShapeCallback},attr:{'data-layer-index':$index}">
                        <!-- ko if: type() == "marker" -->
                          <a class="ro-shape-title" href="#" data-bind="css:{'ro-shape-active':$parents[1].selectedShape()==$data},click:$parents[1].showShape.bind($parents[1],$data)">
                            <i class="glyphicon" data-bind="css:icon"></i>
                            <span data-bind="text:name"></span>
                          </a>
                        <!-- /ko -->
                        <!-- ko if: type() == "directions" -->
                          <div class="ro-shape-directions">
                            <!-- ko if: $parents[1].selectedShape()==$data && editing() -->
                              <div class="ro-shape-title ro-shape-active">
                                <!--
                                <div class="ro-controls ro-controls-aright">
                                  <a class="glyphicon glyphicon-remove" title="Delete Directions" href="#" data-bind="click:deleteShape"></a>
                                </div>
                                -->
                                <div class="ro-as-link">
                                  <i class="glyphicon icon-directions"></i>
                                  <span data-bind="text:name()||'Create Route'"></span>
                                </div>
                                <div class="ro-destinations-list" data-bind="sortable:{data:destinations,connectClass:'ro-destinations-list'}">
                                  <div class="input-group input-group-sm form-group">
                                    <span class="input-group-addon ro-destination-label" data-bind="text:'ABCDEFGHIJKLMNOPQRSTUVWXYZ'[$index() % 26]"></span>
                                    <input type="text" class="form-control" data-bind="value:name,event:{focus:createAutocomplete,blur:destroyAutocomplete}" placeholder=" Add Destination Point">
                                    <a class="btn btn-default glyphicon glyphicon-remove input-group-addon remove-destination-button" href="#" data-bind="visible:$parent.destinations().length>2,click:$parent.removeDestination.bind($parent,$data)"></a>                              
                                  </div>
                                </div>
                                <div class="ro-sub-checkboxes">
                                  <a data-bind="click:toggleAvoidHighways,clickBubble:false" href="#">
                                    <i class="glyphicon" data-bind="css:{'glyphicon-check':avoidHighways(),'glyphicon-unchecked':!avoidHighways()}"></i>
                                    No Highways
                                  </a>
                                  <a data-bind="click:toggleAvoidTolls,clickBubble:false" href="#">
                                    <i class="glyphicon" data-bind="css:{'glyphicon-check':avoidTolls(),'glyphicon-unchecked':!avoidTolls()}"></i>
                                    No Tolls
                                  </a>
                                </div>
                                <div class="ro-links-right">
                                  <a href="#" data-bind="click:addDestination.bind($data,'')">Add Destination</a>
                                  <a href="#" data-bind="click:done.bind($data,'')">Apply</a>
                                </div>
                              </div>
                            <!-- /ko -->
                            <!-- ko if: $parents[1].selectedShape()==$data && !editing() -->
                              <div class="ro-shape-title ro-shape-active">
                                <!--
                                <div class="ro-controls ro-controls-aright">
                                  <a class="glyphicon glyphicon-cog" title="Edit Directions" href="#" data-bind="click:editDirections"></a>
                                </div>
                                -->
                                <div class="ro-as-link">
                                  <i class="glyphicon icon-directions"></i>
                                  <span data-bind="text:name()||'Untitled Directions'"></span>
                                </div>
                                <div class="ro-destinations-params" data-bind="text:paramsPrint"></div>
                                <div class="ro-destinations-list" data-bind="foreach:destinations">
                                  <div>
                                    <span class="badge" data-bind="text:'ABCDEFGHIJKLMNOPQRSTUVWXYZ'[$index() % 26]"></span>
                                    <span data-bind="text:name()||' --No destination--'"></span>
                                  </div>
                                </div>
                                <div class="ro-links-right">
                                  <a href="#" title="Edit" data-bind="click:editDirections">Edit</a>
                                </div>
                              </div>
                            <!-- /ko -->
                            <!-- ko if: $parents[1].selectedShape()!=$data -->
                              <a class="ro-shape-title" href="#" data-bind="click:$parents[1].editShape.bind($parents[1],$data)">
                                <i class="glyphicon icon-directions"></i>
                                <span data-bind="text:name()||'Untitled Directions'"></span>
                                <div class="ro-destinations-params" data-bind="text:paramsPrint"></div>
                                <!--
                                <div class="ro-directions-list ro-directions-unselected" data-bind="sortable:{data:destinations,connectClass:'ro-destinations-list'}">
                                  <div>
                                    <span class="badge" data-bind="text:$index()+1"></span>
                                    <span data-bind="text:name()||' --Empty destination--'"></span>
                                  </div>
                                </div>
                                -->
                              </a>
                            <!-- /ko -->
                          </div>
                        <!-- /ko -->
                      </div>
                    </div>
                  <!-- /ko -->
                </div>
              </div>
            </div>

            <!-- Toolbar -->
            <!-- ko with: toolbar -->
              <div class="ro-toolbar ro-controls" data-bind="foreach:tools">
                <a href="#" role="button" data-bind="css:{'ro-tool-selected':$data==$parent.currentTool(),'disabled':!isEnabled()},attr:{title:title},click:$parent.selectTool.bind($parent,$data)"><i class="glyphicon" data-bind="css:icon"></i></a>
              </div>
            <!-- /ko -->

            <!-- Edit layer settings -->
            <!-- ko with: selectedLayer -->
            <!-- ko with: settings2edit -->
              <div class="ro-overlay">
                <div class="ro-dialog ro-edit-layer-dialog">
                  <div class="modal-header">
                    <button class="close" data-bind="click:$parent.close.bind($parent)">&times;</button>
                    <h4 class="modal-title">Layer Settings</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label for="inputProjectName" class="control-label col-sm-2">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputProjectName" placeholder="Project Name" data-bind="value:name">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" data-bind="checked:isVisible"> Visible
                            </label>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button class="btn btn-danger" data-bind="click:$parent.destroyLayer.bind($parent)">Delete Layer</button>
                        </div>
                      </div> 
                    </div>
                  </div>
                  <div class="ro-dialog-to-bottom">
                    <div class="ro-window-buttons modal-footer">
                      <button class="btn btn-primary" data-bind="click:$parent.saveSettings.bind($parent)">Save</button>
                      <button class="btn btn-default" data-bind="click:$parent.close.bind($parent)">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- /ko -->
            <!-- /ko -->

            <!-- Edit project overlay -->
            <!-- ko with: settings2edit -->
              <div class="ro-overlay">
                <div class="ro-dialog ro-edit-project-dialog">
                  <div class="modal-header">
                    <button class="close" data-bind="click:$parent.close.bind($parent)">&times;</button>
                    <h4 class="modal-title">Settings</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-horizontal">
                      <div class="form-group">
                        <label for="inputProjectName" class="control-label col-sm-2">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputProjectName" placeholder="Project name" data-bind="value:name">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputProjectDescription" class="control-label col-sm-2">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputProjectDescription" data-bind="value:description"></textarea>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-10 col-sm-offset-2">
                          Total distance: <span data-bind="text:$parent.totalDistance"></span>, total drive time: <span data-bind="text:$parent.totalDuration"></span> (visible layers)
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button class="btn btn-danger" data-bind="click:$parent.exportProject.bind($parent)">Export Map to JSON</button>
                        </div>
                      </div> 
                    </div>
                  </div>
                  <div class="ro-dialog-to-bottom">
                    <div class="ro-window-buttons modal-footer">
                      <button class="btn btn-primary" data-bind="click:$parent.saveSettings.bind($parent)">Save</button>
                      <button class="btn btn-default" data-bind="click:$parent.close.bind($parent)">Cancel</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- /ko -->

            <!-- Export project overlay -->
            <!-- ko if: exportData -->
              <div class="ro-overlay">
                <div class="ro-dialog ro-export-project-dialog">
                  <div class="modal-header">
                    <button class="close" data-bind="click:close">&times;</button>
                    <h4 class="modal-title">Export Map data</h4>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <textarea class="form-control" data-bind="value:exportData" readonly rows="10"></textarea>
                    </div>
                  </div>
                  <div class="ro-dialog-to-bottom">
                    <div class="ro-window-buttons modal-footer">
                      <button class="btn btn-default" data-bind="click:close">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            <!-- /ko -->

          <!-- /ko -->




          <!-- Welcome screen overlay -->
          <!-- ko ifnot: currentProject -->
            <div class="ro-overlay">
              <div class="ro-dialog ro-welcome-dialog">
                <div class="ro-dialog-inner">
                  <!-- <h1>Route Planner</h1>
                  <p class="lead">TrackMyShuttle tool for planning routes.</p>
                  <p class="ro-off">Description here.</p> -->
                  <!-- ko with: projectManager -->
                    <!-- ko if: message -->
                      <div class="alert alert-info ro-welcome-offset">
                        <p data-bind="text:message"></p>
                        <div class="clearfix">
                          <div class="btn-group pull-right">
                            <a class="btn btn-default" role="button" data-bind="click:setVar.bind($data,'page',null)">Close</a>
                          </div>
                        </div>
                      </div>
                    <!-- /ko -->
                    <!-- ko ifnot: message -->
                      <!-- ko ifnot: page -->
                        <div class="btn-group ro-welcome-offset btn-group-lg btn-group-justified btn-grouper-ro">
                          <a class="btn btn-primary" role="button" data-bind="click:createProject">Create Route Map</a>
                          <a class="btn btn-primary" role="button" data-bind="click:getProjectsList">Load Route Map</a>
                          <a class="btn btn-primary" role="button" data-bind="click:setVar.bind($data,'page','importProject')">Import with JSON</a>                         
                        </div>
                        <div class="ro-dialog-to-bottom">
                          <p class="checkbox ro center"><label><input type="checkbox" data-bind="checked:cookiesEnabled"> I would like to enable cookies to store my information.</label></p>
                        </div>
                      <!-- /ko -->
                      <!-- ko if: page() == "importProject" -->
                        <div class="ro-welcome-offset">
                          <div class="form-group">
                            <textarea class="form-control" rows="6" placeholder="Paste here the project's JSON data" data-bind="value:loadProjectData"></textarea>
                          </div>
                          <div class="form-group pull-right">
                            <a class="btn btn-primary" role="button" data-bind="click:loadProject.bind($data,null)">Load</a>
                            <a class="btn btn-default" role="button" data-bind="click:setVar.bind($data,'page',null)">Cancel</a>
                          </div>
                        </div>
                      <!-- /ko -->
                      <!-- ko if: page() == "projectsList" -->
                        <!-- ko if: projects().length > 0 -->
                          <div class="ro-welcome-offset ro-projects-list">
                            <table class="table table-bordered">
                              <tbody data-bind="foreach:projects">
                                <tr>
                                  <td data-bind="text:name"></td>
                                  <td data-bind="text:id"></td>
                                  <td><a href="#" data-bind="click:$parent.getProject.bind($parent,id)">Load Map</a></td>
                                  <td><a href="#" data-bind="click:$parent.deleteProject.bind($parent,id)">Delete</a></td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="form-group pull-right">
                            <a class="btn btn-default" role="button" data-bind="click:setVar.bind($data,'page',null)">Cancel</a>
                          </div>
                        <!-- /ko -->
                        <!-- ko if: projects().length == 0 -->
                          <div class="alert alert-info ro-welcome-offset">
                            <p>Projects not found</p>
                            <div class="clearfix">
                              <div class="btn-group pull-right">
                                <a class="btn btn-default" role="button" data-bind="click:setVar.bind($data,'page',null)">Close</a>
                              </div>
                            </div>
                          </div>
                        <!-- /ko -->
                      <!-- /ko -->
                    <!-- /ko -->
                  <!-- /ko -->
                </div>
              </div>
            </div>
          <!-- /ko -->
        </div>

        <!-- Search box -->
        <div class="ro-search" data-bind="visible:currentProject">
          <input id="search" class="form-control" type="text" data-bind="value:q,valueUpdate:'afterkeydown'" placeholder="">
          <a class="ro-search-clear ro-controls glyphicon glyphicon-remove" href="#" data-bind="visible:q().length>0,click:clearSearch"></a>
        </div>

        <!-- Notification bar -->
        <div class="ro-notification-bar alert border-warning alert-warning" data-bind="fade:notificationBar.isVisible,css:notificationBar._style">
          <button type="button" class="close ro" data-bind="click:notificationBar.close.bind(notificationBar)">&times;</button>
          <p><i class="material-icons list-icon">warning</i> <span class="alert-warning spacer" data-bind="text:notificationBar._text"></span></p>
        </div>

        <!-- Edit marker shape info window -->
        <script type="text/template" id="editMarkerShapeInfoWindowTemplate">
          <div id="editMarkerShapeInfoWindow" class="ro-iwnd">
            <h4>Edit Marker</h4>
            <div class="modal-body form-horizontal">
              <div class="form-group">
                <label for="inputMarkerName" class="control-label col-sm-2">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="inputMarkerName" placeholder="Marker name" data-bind="value:name">
                </div>
              </div>
              <div class="form-group">
                <label for="inputMarkerDescription" class="control-label col-sm-2">Description</label>
                <div class="col-sm-10">
                  <textarea class="form-control" id="inputMarkerDescription" rows="5" placeholder="Marker description" data-bind="value:description"></textarea>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-primary" data-bind="click:saveShape">Save</button>
              <button class="btn btn-default" data-bind="click:close">Cancel</button>
              <button class="btn btn-default" data-bind="click:deleteShape">Delete Marker</button>
            </div>
          </div>
        </script>

        <!-- Show marker shape info window -->
        <script type="text/template" id="showMarkerShapeInfoWindowTemplate">
          <div id="showMarkerShapeInfoWindow" class="ro-iwnd">
            <h4 id="showMarkerShapeInfoWindow-name"></h4>
            <div class="ro-iwnd-search-result" id="showMarkerShapeInfoWindow-content"></div>
            <div class="ro-iwnd-add-to-map">
              <a href="#" id="showMarkerShapeInfoWindow-edit">Edit</a>
              &nbsp;|&nbsp;
              <a href="#" id="showMarkerShapeInfoWindow-delete">Delete</a>
            </div>
          </div>
        </script>

        <!-- Search result info window -->
        <script type="text/template" id="searchResultInfoWindowTemplate">
          <div id="searchResultInfoWindow" class="ro-iwnd">
            <h4 id="searchResultInfoWindow-name"></h4>
            <div class="ro-iwnd-search-result" id="searchResultInfoWindow-content"></div>
            <div class="ro-iwnd-add-to-map">
              <a href="#"id="searchResultInfoWindow-add">Add to Map</a>
            </div>
          </div>
        </script>
        
        <script src="assets/vendors/route-planner/lib/require-2.1.8.min.js" data-main="assets/vendors/route-planner/js/init"></script>
  </body>
</html>