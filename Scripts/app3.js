const addLoginModal = document.querySelector('#add-modal');
const startAddLoginButton = document.querySelector('#log');
const backdrop = document.getElementById('backdrop');

const toggleBackdrop = () => {
  backdrop.classList.toggle('visible');
};

const toggleLoginModal = () => { // function() {}
  addLoginModal.classList.toggle('visible');
  toggleBackdrop();
};

const cancelAddLogin = () => {
  toggleLoginModal();
};

const backdropClickHandler = () => {
  toggleLoginModal();
};

startAddLoginButton.addEventListener('click', toggleLoginModal);
backdrop.addEventListener('click', toggleLoginModal);