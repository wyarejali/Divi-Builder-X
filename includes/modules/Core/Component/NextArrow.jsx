import React, { Component } from 'react';
import { renderIcon } from '../Divi-Builder-X-core';

class NextArrow extends Component {
    render() {
        const { className, style, onClick, icon } = this.props;

        return (
            <button
                className={`${className} dibx_slider_icon dibx_next_icon`}
                onClick={onClick}
                style={{ ...style, display: 'block' }}
            >
                <i className="dibx_icon">{renderIcon(icon)}</i>
            </button>
        );
    }
}

export default NextArrow;
