import React, { Component } from 'react';

import './styles.css';

import { renderIconStyle, setResponsiveCSS } from '../Core/Divi-Builder-X-core';

class AdvancedDivider extends Component {
    static slug = 'dibx_divider';

    static css(props) {
        const additionalCss = [];
        let iconStyle = [];

        if (props.use_text === 'off') {
            iconStyle = renderIconStyle(
                props,
                'divider_icon',
                '%%order_class%% .dibx_divider_icon .dibx_icon'
            );
        }

        additionalCss.push([
            {
                selector: `%%order_class%% .dibx_divider`,
                declaration: `
				  border-top-style: ${props.divider_style};
                  border-top-width: ${props.divider_weight};
                  border-top-color: ${props.divider_color}`,
            },
        ]);

        const styles = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dibx_divider_icon i.dibx_icon',
                optionName: 'icon_color',
                property: 'color',
                hoverSelector:
                    '%%order_class%% .dibx_divider_icon:hover i.dibx_icon',
            },
            {
                selector: '%%order_class%% .dibx_divider_icon i.dibx_icon',
                optionName: 'icon_bg',
                property: 'background',
                hoverSelector: '%%order_class%% .dibx_divider_icon:hover',
            },
            {
                selector: '%%order_class%% .dibx_divider_icon i.dibx_icon',
                optionName: 'icon_size',
                property: 'font-size',
            },
            {
                selector: '%%order_class%% .dibx_divider_icon i.dibx_icon',
                optionName: 'icon_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dibx_divider-title',
                optionName: 'text_bg',
                property: 'background',
            },
            {
                selector: '%%order_class%% .dibx_divider-title',
                optionName: 'text_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dibx_divider_wrapper',
                optionName: 'divider_gap',
                property: 'gap',
            },
        ]);

        return additionalCss.concat(iconStyle).concat(styles);
    }

    render_icon = () => {
        const utils = window.ET_Builder.API.Utils;
        const Icon = utils.processFontIcon(this.props.divider_icon);

        return (
            <div className="dibx_divider_icon">
                <i className="dibx_icon">{Icon}</i>
            </div>
        );
    };

    render_heading = () => {
        const heading = this.props.divider_text;
        const Title = this.props.divider_text_level
            ? this.props.divider_text_level
            : 'h3';

        return <Title className="dibx_divider-title">{heading}</Title>;
    };

    render_content = () => {
        const is_text = this.props.use_text;

        if (is_text === 'on') {
            return this.render_heading();
        }

        return this.render_icon();
    };

    render() {
        const classes = [];
        classes.push('dibx_divider-' + this.props.divider_position);
        return (
            <div className={`dibx_divider_wrapper ${classes.join(' ')}`}>
                <div className="dibx_divider-before dibx_divider"></div>
                {this.render_content()}
                <div className="dibx_divider-after dibx_divider"></div>
            </div>
        );
    }
}

export default AdvancedDivider;
