var Illustrator = {
  els: {
    head: $('.head'),
    hat: $('.hat'),
    torso: $('.torso'),
    leftArm: $('.left-arm'),
    rightArm: $('.right-arm'),
    leftLeg: $('.left-leg'),
    rightLeg: $('.right-leg'),
    hangmanParts: $('.hangman-body')
  },
  numPartsDisplayed: 0,

  displayNextBodyPart: function() {
    orderedParts = [ Illustrator.els.head, Illustrator.els.hat, Illustrator.els.torso, Illustrator.els.leftArm, Illustrator.els.rightArm, Illustrator.els.leftLeg, Illustrator.els.rightLeg ];
    next = orderedParts[ Illustrator.numPartsDisplayed ];
    next.fadeIn();
    Illustrator.numPartsDisplayed += 1;
  },

  reset: function() {
    Illustrator.els.hangmanParts.hide();
    Illustrator.numPartsDisplayed = 0;
  }
}