<?php

$siteID = get_theme_mod('connect_your_site_to_aff_wiz');
$geoID = get_theme_mod('connect_your_site_to_aff_wiz_id');
$list = wp_remote_get("https://app.aff-wiz.com/wp-json/api/v1/get_site_table?website_id={$siteID}&geo_id={$geoID}&category_id={$categoryID}");
// var_dump($a['category_id'] );
if (is_wp_error($list)) {
    return false; // Bail early
}
$list = wp_remote_retrieve_body($list);
$datas = json_decode($list);
/// var_dump($datas->data);
$datas = $datas->data;

uasort($datas, function ($item1, $item2) {
    return $item1->readingOrder <=> $item2->readingOrder;
});

$withstring = [];
foreach ($datas as $value) {
    if (is_string($value->readingOrder)) {
        $withstring[] = $value;
    }
}
$nostring = [];
foreach ($datas as $value) {
    if (!is_string($value->readingOrder)) {
        $nostring[] = $value;
    }
}
$datas = array_merge($withstring, $nostring);

if (!empty($datas)) { ?>

<style>
    /* Table Start */
    h2 {
        text-align: center;
        font-size: 18px;
        letter-spacing: 1px;
        color: white;
        padding: 30px 0;
    }

    /* Table Styles */

    .table-wrapper {
        margin: 10px 70px 70px;
        box-shadow: 0px 35px 50px rgba(0, 0, 0, 0.2);
    }

    .fl-table {
        border-radius: 5px;
        font-size: 12px;
        font-weight: normal;
        border: none;
        border-collapse: collapse;
        width: 100%;
        max-width: 100%;
        white-space: nowrap;
        background-color: white;
    }

    .fl-table td,
    .fl-table th {
        text-align: center;
        padding: 8px;
    }

    .fl-table td {
        border-right: 1px solid #f8f8f8;
        font-size: 14px;
    }

    .fl-table thead th {
        color: #ffffff;
        background: #00A6FB;
        font-size: 21px;
    }


    .fl-table thead th:nth-child(odd) {
        color: #ffffff;
        background: #00A6FB;
    }

    .fl-table tr:nth-child(even) {
        background: #F8F8F8;
    }

    /* Responsive */

    @media (max-width: 767px) {
        .fl-table {
            display: block;
            width: 100%;
        }

        .table-wrapper:before {
            content: "Scroll horizontally >";
            display: block;
            text-align: right;
            font-size: 11px;
            color: white;
            padding: 0 0 10px;
        }

        .fl-table thead,
        .fl-table tbody,
        .fl-table thead th {
            display: block;
        }

        .fl-table thead th:last-child {
            border-bottom: none;
        }

        .fl-table thead {
            float: left;
        }

        .fl-table tbody {
            width: auto;
            position: relative;
            overflow-x: auto;
        }

        .fl-table td,
        .fl-table th {
            padding: 20px .625em .625em .625em;
            height: 60px;
            vertical-align: middle;
            box-sizing: border-box;
            overflow-x: hidden;
            overflow-y: auto;
            width: 120px;
            font-size: 13px;
            text-overflow: ellipsis;
        }

        .fl-table thead th {
            text-align: left;
            border-bottom: 1px solid #f7f7f9;
        }

        .fl-table tbody tr {
            display: table-cell;
        }

        .fl-table tbody tr:nth-child(odd) {
            background: none;
        }

        .fl-table tr:nth-child(even) {
            background: transparent;
        }

        .fl-table tr td:nth-child(odd) {
            background: #F8F8F8;
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tr td:nth-child(even) {
            border-right: 1px solid #E6E4E4;
        }

        .fl-table tbody td {
            display: block;
            text-align: center;
        }
    }
</style>
<div>
    <h2>Responsive Table</h2>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Rank</th>
                    <th>Brand</th>
                    <th>Rating</th>
                    <th>Info</th>
                    <th>Play now</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                    <td>Content 1</td>
                </tr>
                <tr>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                    <td>Content 2</td>
                </tr>
                <tr>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                    <td>Content 3</td>
                </tr>
                <tr>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                    <td>Content 4</td>
                </tr>
                <tr>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                    <td>Content 5</td>
                </tr>
                <tr>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                    <td>Content 6</td>
                </tr>
                <tr>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                    <td>Content 7</td>
                </tr>
                <tr>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                    <td>Content 8</td>
                </tr>
                <tr>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                    <td>Content 9</td>
                </tr>
                <tr>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                    <td>Content 10</td>
                </tr>
            <tbody>
        </table>
    </div>
</div>
<?php
} else { ?>
    <div style="width: 100%; max-width: 700px;margin: 0 auto; text-align: center;">
    <h2>Sorry This feature not excited right now.</h2>
    <h4>What can you do?</h4>
    <ol>
        <li>Contact your king developer</li>
    </ol>
    <img style="width: 100%; max-width: 700px; height: auto;" src="https://media.giphy.com/media/3ohs4kgCYdVkJDhQGY/giphy.gif" />
</div>
<?php
}
?>
