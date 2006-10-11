<?php

require 'Structures/LinkedList/Single.php';

/* To do anything useful with a linked list, you need to
 * extend the Node class to hold data associated with the
 * node. In this case, we're just going to hold a single
 * integer in the $_my_number property.
 */
class LinkTester extends Structures_LinkedList_SingleNode {
    protected $_my_number;

    function __construct($num) {
        $this->_my_number = $num;
    }

    function getNumb() {
        return $this->_my_number;
    }

    function setNumb($numb) {
        $this->_my_number = $numb;
    }
}

/* Now we'll create some instances of the new class */
$node1 = new LinkTester(1);
$node2 = new LinkTester(2);
$node3 = new LinkTester(3);
$node4 = new LinkTester(4);
$node5 = new LinkTester(5);

/* Start by instantiating a list object.
 * You can either pass the first node to the constructor,
 * or leave it null and add nodes later.
 */
$list = new Structures_LinkedList_Single($node1); // 1

/* appendNode() adds a node to the end of the list */
$list->appendNode($node2); // 1-2

/* prependNode() adds a node to the start of the list */
$list->prependNode($node3); // 3-1-2

/* insertNode($new_node, $reference_node, $before) adds a node
 * before the reference node if the third parameter is true,
 * or after the reference node if the third parameter is false
 */
$list->insertNode($node4, $node2, true); // 3-1-4-2

/* current() returns the current pointer node in the list */
$link = $list->current(); // 1

/* You can iterate through a list with the next() method */
do {
    print $link->getNumb();
} while ($link = $list->next()); // 1-4-2

/* rewind() resets the pointer to the root node of the list */
$link = $list->rewind(); // 3

/* You can also iterate through a list with foreach().
 * Override the key() method to enable $key=>$value iteration.
 */
foreach ($list as $bull) {
  print $bull->getNumb();
} // 3-1-4-2

/* end() resets the pointer to the last node of the list */
$link = $list->end(); // 2

/* You can iterate backwards through a list with previous() */
do {
    print $link->getNumb();
} while ($link = $list->previous()); // 2-4-1-3
?>
