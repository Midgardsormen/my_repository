
/**
 * Setup server list
 */

var wplc_baseurl = config.baseurl;

var wplc_server_list = [
  "https://bleeper.us-3.evennode.com",
  "https://bleeper-eu-1.eu-4.evennode.com",
  "https://bleeper-eu-2.eu-4.evennode.com",
  "https://bleeper-us-2.us-3.evennode.com",
  "https://livechat-001.us-3.evennode.com",
  "https://livechat-002.us-3.evennode.com",
  "https://livechat-003.us-3.evennode.com",
  "https://livechat-004.eu-4.evennode.com",
  "https://livechat-005.eu-4.evennode.com",
  "https://livechat-006.eu-4.evennode.com",
  "https://livechat-007.eu-4.evennode.com",
  "https://livechat-008.eu-4.evennode.com",
  "https://livechat-009.eu-4.evennode.com",
  "https://livechat-010.eu-4.evennode.com",
  "https://livechat-011.eu-4.evennode.com",
  "https://livechat-012.us-3.evennode.com",
  "https://livechat-013.us-3.evennode.com",
  "https://livechat-014.us-3.evennode.com",
  "https://livechat-015.us-3.evennode.com",
  "https://livechat-016.us-3.evennode.com"
];
var WPLC_SOCKET_URI = "";

function wplc_shuffle(array) {
  var currentIndex = array.length;
  var temporaryValue;
  var randomIndex;
  while (0 !== currentIndex) {
    randomIndex = Math.floor(Math.random() * currentIndex);
    currentIndex -= 1;
    temporaryValue = array[currentIndex];
    array[currentIndex] = array[randomIndex];
    array[randomIndex] = temporaryValue;
  }
  return array;
}  

function wplc_get_random_server() {
  return wplc_server_list[Math.floor(Math.random()*wplc_server_list.length)];
}

function wplc_ping_server(srv, count, onPingFinished){
  var dt = (new Date).getTime();
  jQuery.get( srv + "/api/v1/ping", function() {
      var diff = (new Date).getTime() - dt + Math.floor(Math.random()*10) - 20;
      if (diff<wlpc_server_best_ping){
        wlpc_server_best_ping = diff;
        wlpc_server_best_srv = srv;
      }
      console.debug('ping',srv,diff);
    })
    .fail(function() {
      console.info('ping',srv,'FAILED');
    })
    .always(function(){
      wlpc_server_count_pinger++;
      if (wlpc_server_count_pinger == count) {
        onPingFinished(wlpc_server_best_srv,wlpc_server_best_ping);
      }

    });
}

function wplc_ping_all_servers(slist, overrideServer, onPingFinished){
  if (overrideServer!=""){
    onPingFinished(overrideServer,0);
  } else {
    var srv_list = wplc_shuffle(slist);
    wlpc_server_count_pinger = 0;
    wlpc_server_best_ping = 10000;
    wlpc_server_best_srv = '';
    for(var i=0;i<srv_list.length;i++){
      wplc_ping_server(srv_list[i], srv_list.length, onPingFinished);
    }
  }
}