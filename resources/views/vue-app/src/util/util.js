import {Spinner} from 'vux'

export const loading={
  show:function(){
    if($(".loading")[0]){
      return;
    }
    let modalContainer=document.body;
    $(modalContainer).append('<div class="loading"><span class="vux-spinner vux-spinner-lines"><svg viewBox="0 0 64 64"><g stroke-width="7" stroke-linecap="round"><line x1="10" x2="10" y1="17.3333" y2="46.6667"><animate attributeName="y1" dur="750ms" values="16;18;28;18;16;16" repeatCount="indefinite"></animate><animate attributeName="y2" dur="750ms" values="48;46;36;44;48;48" repeatCount="indefinite"></animate><animate attributeName="stroke-opacity" dur="750ms" values="1;.4;.5;.8;1;1" repeatCount="indefinite"></animate></line><line x1="24" x2="24" y1="16" y2="48"><animate attributeName="y1" dur="750ms" values="16;16;18;28;18;16" repeatCount="indefinite"></animate><animate attributeName="y2" dur="750ms" values="48;48;46;36;44;48" repeatCount="indefinite"></animate><animate attributeName="stroke-opacity" dur="750ms" values="1;1;.4;.5;.8;1" repeatCount="indefinite"></animate></line><line x1="38" x2="38" y1="16.6667" y2="46.6667"><animate attributeName="y1" dur="750ms" values="18;16;16;18;28;18" repeatCount="indefinite"></animate><animate attributeName="y2" dur="750ms" values="44;48;48;46;36;44" repeatCount="indefinite"></animate><animate attributeName="stroke-opacity" dur="750ms" values=".8;1;1;.4;.5;.8" repeatCount="indefinite"></animate></line><line x1="52" x2="52" y1="21.3333" y2="41.3333"><animate attributeName="y1" dur="750ms" values="28;18;16;16;18;28" repeatCount="indefinite"></animate><animate attributeName="y2" dur="750ms" values="36;44;48;48;46;36" repeatCount="indefinite"></animate><animate attributeName="stroke-opacity" dur="750ms" values=".5;.8;1;1;.4;.5" repeatCount="indefinite"></animate></line></g></svg></span></div>')
  },
  hide:function(){
    $(".loading").remove();
  }
}
export const init_ad={
  show:function(url,src,show_time,text){
    if($(".init-ad")[0]){
      return;
    }
    let modalContainer=document.body;
    $(modalContainer).append('<div class="init-ad"><div class="link-img"><a href="'+url+'"><img src="'+src+'" alt=""></a></div><div class="font-normal padding-10 text-center">'+text+'</div></div>');
  },
  hide:function(){
    $(".init-ad").remove();
  }
}
