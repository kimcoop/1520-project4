
// Basic JavaScript Templating based on John Resig's version

(function(){

  this.getTemplate = function( tmplName ) {
    return document.getElementById( tmplName ).innerHTML;
  }

  this.tmpl = function tmpl( str, data ) {
    
    str = getTemplate( str );

    var convert = new Function("obj", // use metaprogramming to create function
      "var p=[];" +
     
      // Introduce the data as local variables using with(){}
      "with(obj){p.push('" +
     
      // Convert the template into pure JavaScript
      str.replace(/[\r\t\n]/g, " ")
         .replace(/'(?=[^%]*%>)/g,"\t")
         .split("'").join("\\'")
         .split("\t").join("'")
         .replace(/<%=(.+?)%>/g, "',$1,'")
         .split("<%").join("');")
         .split("%>").join("p.push('")
         + "');}return p.join('');");
   
    return convert( data );
  };

})();