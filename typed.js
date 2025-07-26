// Typed.js implementation
document.addEventListener('DOMContentLoaded', function() {
  // Find the longest string to use for height calculation
  const strings = [
    'Web Developer',
    'Frontend Developer',
    'Full Stack Developer',
    'Security Analyst',
    'Data Analyst'
  ];
  
  const options = {
    strings: strings,
    typeSpeed: 50,
    backSpeed: 30,
    backDelay: 1000,
    startDelay: 500,
    loop: true,
    showCursor: true,
    cursorChar: '|',
    stringsElement: null
  };
  
  const typed = new Typed('.text-animation span', options);
});