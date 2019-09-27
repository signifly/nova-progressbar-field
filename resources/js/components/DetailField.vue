<template>
  <div class="flex border-b border-40">
    <div class="w-1/4 py-4">
      <slot>
        <h4 class="font-normal text-80">{{ label }}</h4>
      </slot>
    </div>
    <div class="w-1/4 py-4 break-words">
      <span ref="chartContainer"></span>
    </div>
  </div>
</template>

<script>
var ProgressBar = require("progressbar.js");

export default {
  props: ["resource", "resourceName", "resourceId", "field"],
  data() {
    return {
      options: {
        strokeWidth: 4,
        color: "#FFEA82",
        percentage: 1.0,
        type: "line",
        sub: null
      }
    };
  },
  mounted: function() {
    console.log("crap");
    for (var key in this.field.options) {
      if (this.field.options.hasOwnProperty(key)) {
        this.options[key] = this.field.options[key];
      }
    }
    switch (this.options.type) {
      case "semi-circle":
        this.drawSemiCircle();
        break;

      default:
        this.drawLine();
        break;
    }
  },
  computed: {
    label() {
      return this.fieldName || this.field.name;
    },

    fieldValue() {
      if (
        this.field.value === "" ||
        this.field.value === null ||
        this.field.value === undefined
      ) {
        return false;
      }

      return String(this.field.value);
    },

    shouldDisplayAsHtml() {
      return this.field.asHtml;
    }
  },
  methods: {
    drawLine(options) {
      var bar = new ProgressBar.Line(this.$refs.chartContainer, {
        strokeWidth: this.options.strokeWidth,
        easing: "easeInOut",
        duration: 1400,
        color: this.options.color,
        trailColor: "#eee",
        trailWidth: 1,
        svgStyle: null,
        text: {
          style: {
            color: "#999",
            textAlign: "center",
            position: "relative",
            padding: 0,
            margin: 0,
            transform: null
          },
          autoStyleContainer: false
        },
        from: { color: this.options.fromColor },
        to: { color: this.options.toColor },
        step: (state, bar) => {
          bar.setText(Math.round(bar.value() * 100) + " %");
          if (this.options.animateColor) {
            bar.path.setAttribute("stroke", state.color);
          }
        }
      });

      bar.animate(this.field.value);
    }
  }
};
</script>
