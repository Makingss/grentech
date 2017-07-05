import $ from 'n-zepto'

export default {
  bind:function(el,binding,vnode,oldNode) {
    let _el = $(el);
    
    _el.on('scroll', function(){

      let height = parseFloat(_el.height())
      let scrollTop = parseFloat(_el.scrollTop())
      let totalHeight = height + scrollTop
      console.log(`${_el.height()}-${_el.scrollTop()}-${totalHeight}-${_el[0].scrollHeight}`)
      if (_el[0].scrollHeight - totalHeight <= 3) {
        console.log(`${_el.height()}-${_el.scrollTop()}-${_el[0].scrollHeight}`)
        this.vm[this.expression]()
      }
    })
  }
}
