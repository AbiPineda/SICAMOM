(function() {
  var removeSuccess;

  removeSuccess = function() {
    return $('.button').removeClass('success');
  };

  $(document).ready(function() {
    return $('.button').click(function() {
      $(this).addClass('success');
      return setTimeout(removeSuccess, 3000);
    });
  });

}).call(this);


(function() {
  var removeSuccess;

  removeSuccess = function() {
    return $('.button2').removeClass('success');
  };

  $(document).ready(function() {
    return $('.button2').click(function() {
      $(this).addClass('success');
      return setTimeout(removeSuccess, 3000);
    });
  });

}).call(this);

//# sourceMappingURL=data:application/json;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiIiwic291cmNlUm9vdCI6IiIsInNvdXJjZXMiOlsiPGFub255bW91cz4iXSwibmFtZXMiOltdLCJtYXBwaW5ncyI6IkFBQUE7QUFBQSxNQUFBOztFQUFBLGFBQUEsR0FBZ0IsUUFBQSxDQUFBLENBQUE7V0FDZixDQUFBLENBQUUsU0FBRixDQUFZLENBQUMsV0FBYixDQUF5QixTQUF6QjtFQURlOztFQUdoQixDQUFBLENBQUUsUUFBRixDQUFXLENBQUMsS0FBWixDQUFrQixRQUFBLENBQUEsQ0FBQTtXQUNqQixDQUFBLENBQUUsU0FBRixDQUFZLENBQUMsS0FBYixDQUFtQixRQUFBLENBQUEsQ0FBQTtNQUNsQixDQUFBLENBQUUsSUFBRixDQUFJLENBQUMsUUFBTCxDQUFjLFNBQWQ7YUFDQSxVQUFBLENBQVcsYUFBWCxFQUEwQixJQUExQjtJQUZrQixDQUFuQjtFQURpQixDQUFsQjtBQUhBIiwic291cmNlc0NvbnRlbnQiOlsicmVtb3ZlU3VjY2VzcyA9IC0+XG5cdCQoJy5idXR0b24nKS5yZW1vdmVDbGFzcyAnc3VjY2VzcydcblxuJChkb2N1bWVudCkucmVhZHkgLT5cblx0JCgnLmJ1dHRvbicpLmNsaWNrIC0+XG5cdFx0JChAKS5hZGRDbGFzcyAnc3VjY2Vzcydcblx0XHRzZXRUaW1lb3V0IHJlbW92ZVN1Y2Nlc3MsIDMwMDAiXX0=
//# sourceURL=coffeescript