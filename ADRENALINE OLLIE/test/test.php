<!-- Modal 1 -->
<div id="modal5" class="modal">
  <div class="modal-content">
    <span class="close">×</span>
    <p>Modal 1 content...</p>
  </div>
</div>

<!-- Modal 2 -->


<!-- Trigger buttons -->
<button data-modal="modal5">Open Modal 1</button>


<script>
// Get all trigger buttons
var buttons = document.querySelectorAll('[data-modal]');

// Get all modals
var modals = document.querySelectorAll('.modal');

// Get all close buttons
var closeBtns = document.querySelectorAll('.close');

// Add click event listener to all trigger buttons
buttons.forEach(function(button) {
  button.addEventListener('click', function() {
    var modalId = this.getAttribute('data-modal');
    var modal = document.getElementById(modalId);
    modal.style.display = 'block';
  });
});

// Add click event listener to all close buttons
closeBtns.forEach(function(closeBtn) {
  closeBtn.addEventListener('click', function() {
    modals.forEach(function(modal) {
      modal.style.display = 'none';
    });
  });
});

// Add click event listener to window to close modals when clicking outside of them
window.addEventListener('click', function(event) {
  if (event.target.classList.contains('modal')) {
    modals.forEach(function(modal) {
      modal.style.display = 'none';
    });
  }
});
</script>
