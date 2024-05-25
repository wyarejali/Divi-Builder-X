import React, { Component } from 'react';

class LogoSliderChild extends Component {
    static slug = 'dibx_logo_slider_child';

    render() {
        return (
            <img
                className="dibx_logo_slider-item"
                src={this.props.image}
                alt={this.props.image_alt}
            />
        );
    }
}

export default LogoSliderChild;
