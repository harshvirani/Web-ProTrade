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
<script type="text/javascript">
    $('.actionShow').click(function () {
        var btnid=this.id;
        showDialog({
            title: 'Action',
            text: 'This dialog can be closed by pressing ESC or clicking outside of the dialog.<br/>Pressing "YAY" will fire the configured action.',
            negative: {
                title: 'NO'
            },
            positive: {
                title: 'YES',
                onClick: function (e) {
                    alert(btnid);
                }
            }
        });
    });
    
</script>
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

                        <!--//marketId-->

                        <input type="text" name="marketId" value="<?php echo $market_id; ?>" placeholder="<?php echo $market_id; ?>" hidden="1">
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
/*    .ScrollStyle
    {
        overflow-y: scroll;
    }
    #element::-webkit-scrollbar { 
        display: none; 
    }
    .ScrollStyle::-webkit-scrollbar { 
        display: none; 
    }
     Let's get this party started 
    .ScrollStyle::-webkit-scrollbar {
        width: 5px;

    }

     Track 
    .ScrollStyle::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
        -webkit-border-radius: 7px;
        border-radius: 7px;
    }

     Handle 
    .ScrollStyle::-webkit-scrollbar-thumb {
        -webkit-border-radius: 10px;
        border-radius: 10px;
        background: #2e9089; 
        -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
    }
    .ScrollStyle::-webkit-scrollbar-thumb:window-inactive {
        background: rgba(255,0,0,0.4); 
    }*/
</style>
<main class="mdl-layout__content">    
    <div class="row mdl-grid">
        <div class="mdl-card__actions">
            <div id="mdl-table">

<!--                <button data-toggle="modal" data-target="#addSymbol" tabindex="-1" id="adsym" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored">
                    <i class="material-icons" >add</i>
                </button>-->
                
                <i data-toggle="modal" data-target="#addSymbol" tabindex="-1" id="adsym"  class="material-icons  mdl-color-text--cyan">add_circle_outline</i>
                <div class="mdl-tooltip" for="adsym">
                    Add Symbols
                </div>
                <div  class="mdl-textfield mdl-js-textfield mdl-textfield--expandable is-upgraded is-focused pull-right">
                    <label id="search" class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
                        <i class="material-icons">search</i>
                    </label>

                    <div class="mdl-textfield__expandable-holder">
                        <input class="mdl-textfield__input search" type="text" id="sample6">
                        <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
                    </div>

                </div>

                <table class="mdl-data-table mdl-js-data-table mdl-data-table mdl-shadow--2dp">
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
                                <td>
<!--                                    <button id="<?php echo $symbol['id'];?>" onclick="document.location.href = '<?php echo base_url() . 'admin/market/removeSymbol/' . $symbol['id'] . '/' . $market_id; ?>'"  class="mdl-button mdl-js-button mdl-button--raised">
                                        <i  class="material-icons mdl-color-text--red">remove_circle_outline</i>
                                    </button>-->
                                    
                                    <i onclick="document.location.href = '<?php echo base_url() . 'admin/market/removeSymbol/' . $symbol['id'] . '/' . $market_id; ?>'" class="material-icons mdl-color-text--red">remove_circle_outline</i>       
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</section>
</main>