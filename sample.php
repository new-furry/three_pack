<?php
    use DVDoug\BoxPacker;
    use DVDoug\BoxPacker\Packer;
    use DVDoug\BoxPacker\Test\TestBox;  // use your own object
    use DVDoug\BoxPacker\Test\TestItem; // use your own object

    require_once __DIR__ . '/vendor/autoload.php';
    require_once __DIR__ . '/vendor/dvdoug/boxpacker/src/Packer.php';
    require_once __DIR__ . '/vendor/dvdoug/boxpacker/tests/Test/TestBox.php';
    require_once __DIR__ . '/vendor/dvdoug/boxpacker/tests/Test/TestItem.php';

    $packer = new Packer();

    /*
     * Add choices of box type - in this example the dimensions are passed in directly via constructor,
     * but for real code you would probably pass in objects retrieved from a database instead
     */
    $packer->addBox(new TestBox('Le petite box', 300, 300, 10, 10, 296, 296, 8, 1000, 350, 350, 12, 2, 'pallet'));
    $packer->addBox(new TestBox('Le grande box', 3000, 3000, 100, 100, 2960, 2960, 80, 10000, 350, 350, 12, 5, 'pallet'));

    /*
     * Add items to be packed - e.g. from shopping cart stored in user session. Again, the dimensional information
     * (and keep-flat requirement) would normally come from a DB
     */
    $packer->addItem(new TestItem('Item 1', 250, 250, 12, 200, 20, 500, ['length', 'width'], ['no_over_stacking'],  true), 1); // item, quantity
    $packer->addItem(new TestItem('Item 2', 250, 250, 12, 200, 10, 1000, ['width'], ['no_under_stacking'], true), 2);
    $packer->addItem(new TestItem('Item 3', 250, 250, 24, 200, 0, 20, ['height', 'width'], ['no_over_stacking', 'no_under_stacking'], false), 1);

    $packedBoxes = $packer->pack();
//    $packedBoxes->getVolumeUtilisation();

//    echo "These items fitted into " . count($packedBoxes) . " box(es)" . PHP_EOL;
//    foreach ($packedBoxes as $packedBox) {
//        $boxType = $packedBox->getBox(); // your own box object, in this case TestBox
//        echo "This box is a {$boxType->getReference()}, it is {$boxType->getOuterWidth()}mm wide, {$boxType->getOuterLength()}mm long and {$boxType->getOuterDepth()}mm high" . PHP_EOL;
//        echo "The combined weight of this box and the items inside it is {$packedBox->getWeight()}g" . PHP_EOL;
//
//        echo "The items in this box are:" . PHP_EOL;
//        $packedItems = $packedBox->getItems();
//        foreach ($packedItems as $packedItem) { // $packedItem->getItem() is your own item object, in this case TestItem
//            echo $packedItem->getItem()->getDescription() . PHP_EOL;
//        }
//    }


    foreach ($packedBoxes as $packedBox) {
        $packedItems = $packedBox->getItems();
        foreach ($packedItems as $packedItem) { // $packedItem->getItem() is your own item object
            echo $packedItem->getItem()->getDescription() .  ' was packed at co-ordinate ' ;
            echo '(' . $packedItem->getX() . ', ' . $packedItem->getY() . ', ' . $packedItem->getZ() . ') with ';
            echo 'L ' . $packedItem->getLength() . ', W ' . $packedItem->getWidth() . ', D ' . $packedItem->getDepth();
            echo "=====>";
            echo $packedBox->getVolumeUtilisation();
            echo PHP_EOL;
            echo "<br>";
        }
    }