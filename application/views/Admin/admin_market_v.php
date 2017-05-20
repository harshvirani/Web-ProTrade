<script type="text/javascript">
    function popup(id) {
        showDialog({
            title: 'Delete Symbol',
            text: 'Are You Sure You Want to Delete?',
            negative: {
                title: 'No'
            },
            positive: {
                title: 'Yes',
                onClick: function (e) {
                    document.location.href = '<?php echo base_url() . "admin/market/removeSymbol/"; ?>' + id + '<?php echo "/" . $market_id; ?>';
                }
            }
        });
    }

    $(document).ready(function () {
        'use strict';
        var dialog = document.querySelector('#importCSV');
        var closeButton = dialog.querySelector('.buttonClose');
        var showButton = document.querySelector('#importCSVButton');
        if (!dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        var closeClickHandler = function (event) {
            dialog.close();
        };
        var showClickHandler = function (event) {
            dialog.showModal();
        };
        showButton.addEventListener('click', showClickHandler);
        closeButton.addEventListener('click', closeClickHandler);
    });

    $(document).ready(function () {
        'use strict';
        var dialog = document.querySelector('#addSymbol');
        var closeButton = dialog.querySelector('.buttonClose');
        var showButton = document.querySelector('#addSymbolButton');
        if (!dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        var closeClickHandler = function (event) {
            dialog.close();
        };
        var showClickHandler = function (event) {
            dialog.showModal();
        };
        showButton.addEventListener('click', showClickHandler);
        closeButton.addEventListener('click', closeClickHandler);
    });
</script>
<style>
    .mdl-button--file input {
        cursor: pointer;
        height: 100%;
        right: 0;
        opacity: 0;
        position: absolute;
        top: 0;
        width: 300px;
        z-index: 4;
    }
    .mdl-textfield--file .mdl-textfield__input {
        box-sizing: border-box;
        width: calc(100% - 32px);
    }
    .mdl-textfield--file .mdl-button--file {
        right: 0;
    }

</style>

<dialog class="mdl-dialog" id="importCSV">
    <form action="<?php echo base_url(); ?>Admin/market/importCSV/<?php echo $market_id; ?>" method="post" enctype="multipart/form-data">
        <div class="mdl-dialog__content">

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--file">
                <input class="mdl-textfield__input" name="import" placeholder="No file chosen" type="text" id="TEXT_ID" readonly />
                <input type="text" name="mid" value="<?php echo $market_id; ?>" hidden="true">
                <div class="mdl-button mdl-button--icon mdl-button--file">
                    <i class="material-icons">attach_file</i>
                    <input type="file" name="file" id="ID" onchange="document.getElementById('TEXT_ID').value = this.files[0].name;" />
                </div>
            </div>

            <!--<input type="file" name="file" id="file">-->
        </div>
        <div class="mdl-dialog__actions">
            <button type="submit" class="mdl-button">Add</button>
            <button type="reset" class="buttonClose mdl-button">Cancel</button>
        </div>
    </form>
</dialog>

<dialog class="mdl-dialog" id="addSymbol">
    <form action="<?php echo base_url(); ?>Admin/market/addSymbol/" method="post" enctype="multipart/form-data">
        <div class="mdl-dialog__content">
            <input class="mdl-textfield__input" type="text" name="marketId" value="<?php echo $market_id; ?>" hidden="true">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="name" id="sample3">
                <label class="mdl-textfield__label" for="sample3">Symbol Name</label>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="code" id="sample3">
                <label class="mdl-textfield__label" for="sample3">Symbol Code</label>
            </div>

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="text" name="price" id="sample3">
                <label class="mdl-textfield__label" for="sample3">Price</label>
            </div>
            <!--<input type="file" name="file" id="file">-->
        </div>
        <div class="mdl-dialog__actions">
            <button type="submit" class="mdl-button">Add</button>
            <button type="reset" class="buttonClose mdl-button">Cancel</button>
        </div>
    </form>
</dialog>


<main class="mdl-layout__content">    
    <div class="row mdl-grid">
        <div class="mdl-card__actions">
            <div id="mdl-table">                
                <div  class=" mdl-textfield mdl-js-textfield mdl-textfield--expandable is-upgraded is-focused pull-right">
                    <label id="search" class="op mdl-button mdl-js-button mdl-button--icon" for="sample6">
                        <i class="material-icons">search</i>
                    </label>

                    <div class="mdl-textfield__expandable-holder">
                        <input class="mdl-textfield__input search" type="text" id="sample6">
                        <label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
                    </div>

                    <i class="material-icons" id="hd">more_vert</i>

                    <ul class="mdl-menu mdl-js-menu mdl-js-ripple-effect mdl-menu--bottom-right" for="hd">

                        <li id="addSymbolButton" class="mdl-menu__item">Add Symbol</li>
                        <li id="importCSVButton"  class="mdl-menu__item">
                            Import CSV
                        </li>
                    </ul>
                    <div class="mdl-tooltip" for="importCSVButton">
                        Format of CSV<br>{Name, Code, PriceQuote}
                    </div>
                </div>
                <h1 align="center"><?php echo $market_name[0]["name"]; ?></h1>
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
                                    <!--<button id="<?php echo $symbol['id']; ?>" onclick="document.location.href = '<?php echo base_url() . 'admin/market/removeSymbol/' . $symbol['id'] . '/' . $market_id; ?>'"  class="mdl-button mdl-js-button mdl-button--raised">-->
                                    <i id="<?php echo $symbol['id']; ?>" onclick="popup(this.id)" class="material-icons mdl-color-text--red">remove_circle_outline</i>
                                    <!--</button>-->

                    <!--                                    <i id="<?php echo $symbol['id']; ?>"  class=" marketDelete material-icons mdl-color-text--red">remove_circle_outline</i>       -->
                    <!--onclick="document.location.href = '<?php // echo base_url() . 'admin/market/removeSymbol/' . $symbol['id'] . '/' . $market_id;      ?>'"-->
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