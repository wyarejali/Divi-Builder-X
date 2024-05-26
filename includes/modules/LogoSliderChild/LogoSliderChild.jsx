import React, { Component } from 'react';

class LogoSliderChild extends Component {
    static slug = 'dibx_logo_slider_child';

    render() {
        return (
            <div className="dibx_logo_slider-img-wrapper">
                <img
                    className="dibx_logo_slider-item"
                    src={this.props.image}
                    alt={this.props.image_alt}
                />
            </div>
        );
    }
}

export default LogoSliderChild;
