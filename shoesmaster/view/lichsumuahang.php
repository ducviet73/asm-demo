<?php
$html_bill_detail = "";


foreach ($billdetail as $item) {
    extract($item);

    

    $html_bill_detail .= '
    <tr>
        <td>'.$maHD.'</td>
        <td>'.$ngaymua.'</td>
        <td>'.$tongthanhtoan.'</td>
        <td>
            <span class="badge bg-light text-dark" style="color: ">
                '.$tinhtrang.'
            </span>
        </td>
    </tr>';
}
?>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

<div class="container-xl px-4 mt-4">
   
    <!-- Billing history card-->
    <div class="card mb-4">
        <div class="card-header">Billing History</div>
        <div class="card-body p-0">
            <!-- Billing history table-->
            <div class="table-responsive table-billing-history">
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th class="border-gray-200" scope="col">Transaction ID</th>
                            <th class="border-gray-200" scope="col">Date</th>
                            <th class="border-gray-200" scope="col">Tổng tiền</th>
                            <th class="border-gray-200" scope="col">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?=$html_bill_detail?>
                       
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>