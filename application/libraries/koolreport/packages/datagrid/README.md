# Introduction

`DataGrid` is a package to extend capability of displaying data in table format.

# Installation

1. Download and unzip the package.
2. Copy the `datagrid` folder into `koolreport\packages` folder.

# Documentation

## DataTables

`DataTables` is an advanced solution to display data in table format. Beside the basic feature of displaying data, it supports features such as Row Search, Select, Column Reordering, Fixed Columns, Responsive, Row Group, Scrolling.

### Get started with DataTables

It is simple to setup `DataTables` to display data. Suppose you have had your dataStore and would like to display data in report's view.

__First, you need to declare the class at top of the view__

```
<?php
use \koolreport\datagrid\DataTables;
?>
```

__Second, you create the `DataTables` widget__

```
<?php
DataTables::create(array(
    "dataSource"=>$this->dataStore("orders")
))
?>
```

Simple, isn't it? With above minimum settings, `DataTables` will load data from `orders` dataStore and display all data.

### Properties

|name|type|default|description|
|---|---|---|---|
|`name`|string||Optional. You can set the name for your data table if you want to refer to the table later on at client-side. If you don't set we will set random name for table|
|`columns`|array||Optional. List all the columns you want to display in data table together with its settings|
|`dataSource`|DataStore, Array||Optional. Specify dataStore or array that data table will get data from. If you do not set this, the data table will get data from `data` property|
|`data`|array||Optional. You may set data directly here in form of associate array|
|`options`|array||Optional. This property will hold all the extra settings for data tables|
|`cssClass`|array||Optional. You could set css classes for the table's table, th, tr, td, tf elemens.| 

### Use data property

If you have your own data in array format, you may use `data` property to display them in data table.

```
<?php 
DataTables::create(array(
    "data"=>array(
        array("name"=>"Peter","age"=>35),
        array("name"=>"Karl","age"=>31),
    )
))
?>
```

### Columns property

`columns` property is used to list columns you want to display and its settings.

```
DataTables::create(array(
    "dataSource"=>$this->dataStore("orders"),
    "columns"=>array("orderNumber","customerName","productName","quantity")
))
```

__or more detail settings for each columns__


```
DataTables::create(array(
    "dataSource"=>$this->dataStore("orders"),
    "columns"=>array(
        "orderNumber"=>array(
            "type"=>"number",
            "label"=>"Order#",
        ),
        "customerName"=>array(
            "label"=>"Customer Name",
            "type"=>"string",
        ),
        "productName"=>array(
            "label"=>"Product Name",
            "type"=>"string"
        ),
        "quantity"=>array(
            "label"=>"Quantity"
            "type"=>"number"
        ),
        "priceEach"=>array(
            "label"=>"Price",
            "type"=>"number",
            "prefix"=>"$",
            "decimals"=>2,
        )
    )
))
```

### Enable Searching

To enable searching box for `DataTables`, you do:

```
<?php 
DataTables::create(array(
    "dataSource"=>$this->dataStore("orders")
    "options"=>array(
        "searching"=>true,
    )
))
?>
```

### Enable Paging

To enable paging for `DataTables`, you do:

```
<?php 
DataTables::create(array(
    "dataSource"=>$this->dataStore("orders")
    "options"=>array(
        "paging"=>true,
    )
))
?>
```

### Sorting(ordering) preset

The column sorting is enabled by default, you may preset sorting(order):

```
<?php 
DataTables::create(array(
    "dataSource"=>$this->dataStore("orders")
    "options"=>array(
        "orders"=>array(
            array(0,"desc") //Sort by first column desc
            array(1,"asc") //Sort by second column asc
        ),
    )
))
?>
```

### Column Reorder

`DataTables` allows user to re-order columns by drag and drop, to enable the feature you do:

```
<?php 
DataTables::create(array(
    "dataSource"=>$this->dataStore("orders")
    "options"=>array(
        "colReorder"=>true,
    )
))
?>
```

### Fixed Header

To get the fixed header on top of the page when scrolling, you set:


```
<?php 
DataTables::create(array(
    "dataSource"=>$this->dataStore("orders")
    "options"=>array(
        "fixedHeader"=>true,
    )
))
?>
```

### Row Selection

To enable row selection in `DataTables`, we do:


```
<?php 
DataTables::create(array(
    "dataSource"=>$this->dataStore("orders")
    "options"=>array(
        "select"=>true,
    )
))
?>
```

### Client-side events

`DataTables` support client-side event, below are example of using select event. Note that you should assign name to table so that you can refer to table at client-side:

```
<?php 
DataTables::create(array(
    "clientEvents"=>array(
        "select"=>"function(e,dt,type,indexes){
            var data = dt.rows( indexes ).data().pluck( 'id' );

            // do something with the ID of the selected items
        }"
    )
));
?>
```

Here is the [full list of events](https://datatables.net/reference/event/) which you can do with `DataTables`.


## Support

Please use our forum if you need support, by this way other people can benefit as well. If the support request need privacy, you may send email to us at __support@koolreport.com__.
