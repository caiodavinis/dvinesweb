<?php                                                                             
if ($action == "listGroups"){
?>
	<div class="row">
		<div class="col-md-12">
			<div class="block-flat">
          <div class="header">							
            <h3>Hierarquia dos grupos</h3>
          </div>
          <div class="content">
            <div id="list2" class="dd">
              <ol class="dd-list">
                <li data-id="13" class="dd-item dd3-item">
                  <div class="dd-handle dd3-handle"></div><div class="dd3-content">Item 13</div>
                  <ol class="dd-list" style="">
                    <li data-id="14" class="dd-item dd3-item">
                      <div class="dd-handle dd3-handle"></div><div class="dd3-content">Item 14</div>
                    </li>
                  <li data-id="15" class="dd-item dd3-item">
                    <div class="dd-handle dd3-handle"></div>
                    <div class="dd3-content">Item 15</div>
                    <ol class="dd-list" style="">
                      <li data-id="16" class="dd-item dd3-item">
                        <div class="dd-handle dd3-handle"></div><div class="dd3-content">Item 16</div>
                      </li>
                      <li data-id="17" class="dd-item dd3-item">
                        <div class="dd-handle dd3-handle"></div><div class="dd3-content">Item 17</div>
                      </li>
                      <li data-id="18" class="dd-item dd3-item">
                        <div class="dd-handle dd3-handle"></div><div class="dd3-content">Item 18</div>
                      </li>
                    </ol>
                  </li>
                  </ol>
                </li>
              </ol>
            </div>
          </div>
        </div>				
      </div>			
		</div>
	</div>                                                                           
<?php
}
?>