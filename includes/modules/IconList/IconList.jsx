import React, { Component } from 'react';
import { setResponsiveCSS } from '../Core/Divi-Builder-X-core';

export class IconList extends Component {
    static slug = 'dibx_icon_list';

    static css(props) {
        const additionalCss = [];

        const responsiveCss = setResponsiveCSS(props, [
            {
                selector: '%%order_class%% .dibx_icon_list-item',
                optionName: 'horizontal_align',
                property: 'justify-content',
            },
            {
                selector: '%%order_class%% .dibx_icon_list-item',
                optionName: 'vertical_align',
                property: 'align-items',
            },
            {
                selector: '%%order_class%% .dibx_icon_list-item',
                optionName: 'icon_gap',
                property: 'gap',
            },

            {
                selector: '%%order_class%% .dibx_icon_list-icon i.dibx_icon',
                optionName: 'icon_color',
                property: 'color',
            },
            {
                selector: '%%order_class%% .dibx_icon_list-icon i.dibx_icon',
                optionName: 'icon_bg',
                property: 'background',
            },
            {
                selector: '%%order_class%% .dibx_icon_list-icon i.dibx_icon',
                optionName: 'icon_size',
                property: 'font-size',
            },
            {
                selector: '%%order_class%% .dibx_icon_list-icon i.dibx_icon',
                optionName: 'icon_padding',
                property: 'padding',
            },
            {
                selector: '%%order_class%% .dibx_icon_list-icon',
                optionName: 'icon_margin',
                property: 'margin',
            },

            {
                selector: '%%order_class%% .dibx_icon_list_child',
                optionName: 'item_margin',
                property: 'margin',
                important: true,
            },
            {
                selector: '%%order_class%% .dibx_icon_list_child',
                optionName: 'item_padding',
                property: 'padding',
                important: true,
            },
        ]);

        return additionalCss.concat(responsiveCss);
    }

    render() {
        return (
            <div className="dibx_icon_list-container">
                <div className="dibx_icon_list-items-wrapper">
                    {this.props.content}
                </div>
            </div>
        );
    }
}

export default IconList;
