function openNavigator(target) {
return client.openlink('navigator/tab/' + target);
}
function openCatalog() {
return client.openlink('catalog/open');
}
function openInventory(target) {
return client.openlink('inventory/open/' + target);
}
function openGroup(target) {
return client.openlink('group/' + target);
}