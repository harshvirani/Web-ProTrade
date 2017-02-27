<!-- DELETE POPOVER -->
<div class="container">
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">

                <div class="modal-body">
                    <p>Are You Sure You want to Delete?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">YES</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">NO</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- DELETE POPOVER -->

<!-- ADD MARKET FORM START -->
<div class="container">
    <div id="addMarket" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="format" action="<?php echo base_url(); ?>Admin/market/addMarket" method="post">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="name" type="text" id="sample3">
                            <label class="mdl-textfield__label" for="sample3">New Market Name</label>
                        </div>

                        <div class="modal-footer">
                            <button class="pull-left mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"> ADD  </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ADD MARKET FORM OVER -->

<!-- ADD NEW MEMBER FORM START -->
<div class="container">
    <div id="addSymbol" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <form id="format" action="<?php echo base_url(); ?>Admin/market/addSymbol" method="post">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="name" type="text" id="sample3">
                            <label class="mdl-textfield__label" for="sample3">New Symbol Name</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="code" type="text" id="sample3">
                            <label class="mdl-textfield__label" for="sample3">Symbol Code</label>
                        </div>

                        <div class="mdl-select mdl-js-select mdl-select--floating-label">
                            <select class="mdl-select__input" id="professsion" name="marketId">
                                <option value=""></option>
                                <?php
                                foreach ($markets->result_array() as $mar) {
                                    ?>
                                    <option value="<?php echo $mar['id']; ?>"><?php echo $mar['name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <label class="mdl-select__label" for="professsion">Market</label>
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" name="price" type="number" id="sample3">
                            <label class="mdl-textfield__label" for="sample3">Current Price</label>
                        </div>
                        <div class="modal-footer">
                            <button class="pull-left mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent"> ADD  </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ADD NEW SYMBOL FORM OVER -->
<style type="text/css">
    .ScrollStyle
    {
        overflow-y: scroll;
    }
    #element::-webkit-scrollbar { 
        display: none; 
    }
    /*.ScrollStyle::-webkit-scrollbar { 
        display: none; 
    }*/
    /* Let's get this party started */
    .ScrollStyle::-webkit-scrollbar {
        width: 5px;

    }

    /* Track */
    /*.ScrollStyle::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        -webkit-border-radius: 7px;
        border-radius: 7px;
    }*/

    /* Handle */
    .ScrollStyle::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: #2e9089; 
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    }
    .ScrollStyle::-webkit-scrollbar-thumb:window-inactive {
        background: rgba(255,0,0,0.4); 
    }
</style>
<main class="mdl-layout__content">    
    <br/>


    <div class="mdl-card__actions">
        <div id="mdl-table">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable is-upgraded is-focused pull-right">
                <label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input search" type="text" id="sample6">
                    <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
                </div>
            </div>

            <table id='mdl-table' class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
                <thead>
                    <tr>
                        <th class="mdl-data-table__cell--non-numeric sort" data-sort="material">Name</th>
                        <th class="mdl-data-table__cell--non-numeric material sort" data-sort="quantity">Code</th>
                        <th class="mdl-data-table__cell--non-numeric material sort" data-sort="price" colspan="2">Price Quote</th>
                    </tr>
                </thead>
                <tbody class="list">
                     <?php
    foreach ($symbols->result_array() as $symbol) {
        ?>
                    <tr>
                        <td class="mdl-data-table__cell--non-numeric material"><?php echo $symbol['name']; ?></td>
                        <td class="mdl-data-table__cell--non-numeric material quantity"><?php echo $symbol['code']; ?></td>
                        <td class="mdl-data-table__cell--non-numeric material price"><?php echo $symbol['price_quote']; ?></td>
                        <td><button onclick="document.location.href = '<?php echo base_url() . 'market/removeSymbol/' . $symbol['id'] . '/' . $market_id; ?>'" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
                                            <i class="material-icons mdl-button--colored">delete</i>
                                        </button>
                                    </td>
                    </tr>
                    <?php }
    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!--    <div class="row">
            <div id="mdl-table">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable is-upgraded is-focused">
                    <label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
                        <i class="material-icons">search</i>
                    </label>
                    <div class="mdl-textfield__expandable-holder">
                        <input class="mdl-textfield__input search" type="text" id="sample6">
                        <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
                    </div>
                </div>
                <table id='mdl-table' class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Name</th>
                            <th class="mdl-data-table__cell--non-numeric">Code</th>
                            <th colspan="2" class="mdl-data-table__cell--non-numeric">Price Quote</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
    foreach ($symbols->result_array() as $symbol) {
        ?>
                                <tr>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo $symbol['name']; ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo $symbol['code']; ?></td>
                                    <td class="mdl-data-table__cell--non-numeric"><?php echo $symbol['price_quote']; ?></td>
                                    <td><button onclick="document.location.href = '<?php echo base_url() . NAV_MARKETS . '/removeSymbol/' . $symbol['id'] . '/' . $market_id; ?>'" class="mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-button--colored">
                                            <i class="material-icons mdl-button--colored">delete</i>
                                        </button>
                                    </td>
                                </tr>
    <?php }
    ?>
                    </tbody>
                </table>
    
            </div>
        </div>
    
    
    
    
    
    
    
    
    
    
    
    
    -->






    <!--    <div class="row">
    <?php
    foreach ($markets->result_array() as $mar) {
        ?>
                            <div class="col-lg-4" id="">
                                <div class="panel panel-default ">
                                    <div class="panel-heading">
                                         <h3 class="panel-title"><i class="material-icons">account_balance</i><?php echo $mar['name']; ?></h3> 
                                     <div class="panel-title">
                                            <i id=ico class="icon icon-2x icon-file-text material-icons">account_balance</i>
                                            <span id="text"><?php echo $mar['name']; ?></span>
                                        </div>
                                        <hr>
                                        
                                        <table>
                                            <thead>
                                            <tr>
                                                <th><i class="material-icons">trending_up</i></th>
                                                <th>Symbol Name</th>
                                                <th>Price ( <i class="fa fa-inr" aria-hidden="true"></i> )</th>
                                                <th></th>
                                            </tr>
                                            </thead>
                                        </table>
                                        <div class=" ScrollStyle">
                                        <table>
        <?php
        foreach ($symbols->result_array() as $symbol) {
            if ($symbol['market_id'] == $mar['id']) {
                ?>
                                                                            <tbody>
                                                                            <tr><td><i class="material-icons">trending_up</i></td>
                                                                                <td><?php echo $symbol['name']; ?></td>
                                                                                <td><?php echo $symbol['price_quote']; ?></td>
                                                                                <td class="full-width">
                                                                                    <button class="mdl-button mdl-js-button mdl-button--icon mdl-button--colored" data-toggle="modal" data-target="#myModal">
                                                                                        <i class="material-icons">delete</i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                            </tbody>
                <?php
            }
        }
        ?>
                                                                
                                        </table>  
                                        </div>
                                    </div>
                
                                    <div class="panel-body">
                                        <div class="text-left">
                                            <a data-toggle="modal" data-target="#addSymbol" href="#">Add Symbols <i class="material-icons">add</i></a>
                                        </div>
                                        <div class="text-right">
                                            <a href="#"><i class="material-icons" data-toggle="modal" data-target="#myModal">delete</i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                
                
                            Over One CLient Card
        <?php
    }
    ?>
    
    
    
        </div>-->

</section>
</main>