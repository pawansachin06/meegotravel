/**
 * @license Copyright (c) 2014-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */
import { ClassicEditor } from '@ckeditor/ckeditor5-editor-classic';
import { Alignment } from '@ckeditor/ckeditor5-alignment';
import { Autoformat } from '@ckeditor/ckeditor5-autoformat';
import { Bold, Code, Italic, Strikethrough, Subscript, Superscript, Underline } from '@ckeditor/ckeditor5-basic-styles';
import { BlockQuote } from '@ckeditor/ckeditor5-block-quote';
import { CodeBlock } from '@ckeditor/ckeditor5-code-block';
import type { EditorConfig } from '@ckeditor/ckeditor5-core';
import { Essentials } from '@ckeditor/ckeditor5-essentials';
import { FontSize } from '@ckeditor/ckeditor5-font';
import { Heading } from '@ckeditor/ckeditor5-heading';
import { HorizontalLine } from '@ckeditor/ckeditor5-horizontal-line';
import { HtmlEmbed } from '@ckeditor/ckeditor5-html-embed';
import { GeneralHtmlSupport } from '@ckeditor/ckeditor5-html-support';
import { AutoImage, Image, ImageCaption, ImageResize, ImageStyle, ImageToolbar } from '@ckeditor/ckeditor5-image';
import { Indent, IndentBlock } from '@ckeditor/ckeditor5-indent';
import { AutoLink, Link, LinkImage } from '@ckeditor/ckeditor5-link';
import { List, ListProperties } from '@ckeditor/ckeditor5-list';
import { MediaEmbed } from '@ckeditor/ckeditor5-media-embed';
import { PageBreak } from '@ckeditor/ckeditor5-page-break';
import { Paragraph } from '@ckeditor/ckeditor5-paragraph';
import { PasteFromOffice } from '@ckeditor/ckeditor5-paste-from-office';
import { SourceEditing } from '@ckeditor/ckeditor5-source-editing';
import { SpecialCharacters, SpecialCharactersArrows, SpecialCharactersCurrency, SpecialCharactersEssentials, SpecialCharactersMathematical, SpecialCharactersText } from '@ckeditor/ckeditor5-special-characters';
import { Table, TableCellProperties, TableColumnResize, TableProperties, TableToolbar } from '@ckeditor/ckeditor5-table';
import { TextTransformation } from '@ckeditor/ckeditor5-typing';
import { AccessibilityHelp } from '@ckeditor/ckeditor5-ui';
import { Undo } from '@ckeditor/ckeditor5-undo';
declare class Editor extends ClassicEditor {
    static builtinPlugins: (typeof AccessibilityHelp | typeof Alignment | typeof AutoImage | typeof AutoLink | typeof Autoformat | typeof BlockQuote | typeof Bold | typeof Code | typeof CodeBlock | typeof Essentials | typeof FontSize | typeof GeneralHtmlSupport | typeof Heading | typeof HorizontalLine | typeof HtmlEmbed | typeof Image | typeof ImageCaption | typeof ImageResize | typeof ImageStyle | typeof ImageToolbar | typeof Indent | typeof IndentBlock | typeof Italic | typeof Link | typeof LinkImage | typeof List | typeof ListProperties | typeof MediaEmbed | typeof PageBreak | typeof Paragraph | typeof PasteFromOffice | typeof SourceEditing | typeof SpecialCharacters | typeof SpecialCharactersArrows | typeof SpecialCharactersCurrency | typeof SpecialCharactersEssentials | typeof SpecialCharactersMathematical | typeof SpecialCharactersText | typeof Strikethrough | typeof Subscript | typeof Superscript | typeof Table | typeof TableCellProperties | typeof TableColumnResize | typeof TableProperties | typeof TableToolbar | typeof TextTransformation | typeof Underline | typeof Undo)[];
    static defaultConfig: EditorConfig;
}
export default Editor;
